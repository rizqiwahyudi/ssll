<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{PresenceLog, Mechine};
use Carbon\Carbon;
use Exception;

class PresenceLogController extends Controller
{
    public function sync()
    {
        $mechine = Mechine::where('is_default','1')->first();
        $ip = $mechine->ip;
        $key = $mechine->password;
        $port = $mechine->port;

        try {
            $Connect = fsockopen($ip, $port, $errno, $errstr, 1);
            if($Connect){
                $soap_request="<GetAttLog>
                                    <ArgComKey xsi:type=\"xsd:integer\">".$key."</ArgComKey>
                                    <Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg>
                                </GetAttLog>";

                $newLine="\r\n";
                fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
                fputs($Connect, "Content-Type: text/xml".$newLine);

                fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
                fputs($Connect, $soap_request.$newLine);
                $buffer="";
                while($Response=fgets($Connect, 1024)){
                    $buffer=$buffer.$Response;
                }
            }
        } catch (Exception $exception) {
            alert()->error('Failed','Failed to connect to machine!');
            return redirect()->route('presences.index');
        }


            $buffer=parsePresence($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
            $buffer=explode("\r\n",$buffer);

            if((count($buffer)-2) == PresenceLog::all()->count()){
                toast()->success('Presence log already synced!');
                return redirect()->route('presences.index');
            }else{
                for($i = 0; $i < (count($buffer)); $i++){
                    $data = parsePresence($buffer[$i], "<Row>", "</Row>");
                    $PIN = parsePresence($data, "<PIN>", "</PIN>");
                    $DateTime = parsePresence($data, "<DateTime>", "</DateTime>");
                    $Verified = parsePresence($data, "<Verified>", "</Verified>");
                    $Status = parsePresence($data, "<Status>", "</Status>");

                    if($PIN != 0) {

                        PresenceLog::updateOrCreate(
                            [
                            'date_time' => Carbon::parse($DateTime),
                            'pin'       => sprintf("%'.04s", $PIN)
                            ],
                            [
                            'verified' => $Verified,
                            'status'   => $Status
                            ]
                        );

                        /* $check = PresenceLog::where('date_time', $DateTime)->count();
                        if($check == 0){
                            $absen = new PresenceLog();
                            $absen->pin = sprintf("%'.04s", $PIN);
                            $absen->date_time = Carbon::parse($DateTime);
                            $absen->verified = $Verified;
                            $absen->status = $Status;
                            $absen->save();
                        } */
                    }
                }

                toast()->success('Presence log successfully synced!');
                return redirect()->route('presences.index');
            }
    }
}
