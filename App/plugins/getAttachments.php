<?php
    
    namespace App\plugins

    /**
    * Clase que gestiona la descarga del archivo los pagos desde el correo
    */
    class DownloadAttachments {
        
        function __construct() {
             /* Conectar a gmail con credenciales */
            $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
            $username = 'sandres9011@gmail.com';
            $password = '1116789304';

            /* Conexion via IMAP */
            $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
            /* Filtramos el buzon */
            $date = date("d M Y");
            $emails = imap_search($inbox, 'FROM "sandres9011@gmail.com" SINCE "'.$date.'"');

            /* Verificamos que existan emails en dicho buzon */
            if($emails) {

                /* Reinvertimos el array */
                rsort($emails);

                /* Recorremos todos los email */
                foreach($emails as $email_number) {

                    /* get mail structure */
                    $structure = imap_fetchstructure($inbox, $email_number);

                    $attachments = array();

                    /* if any attachments found... */
                    if(isset($structure->parts) && count($structure->parts)) {
                        for($i = 0; $i < count($structure->parts); $i++) {
                            $attachments[$i] = array(
                                'is_attachment' => false,
                                'filename' => '',
                                'name' => '',
                                'attachment' => ''
                            );

                            if($structure->parts[$i]->ifdparameters) {
                                foreach($structure->parts[$i]->dparameters as $object) {
                                    if(strtolower($object->attribute) == 'filename') {
                                        $attachments[$i]['is_attachment'] = true;
                                        $attachments[$i]['filename'] = $object->value;
                                    }
                                }
                            }

                            if($structure->parts[$i]->ifparameters) {
                                foreach($structure->parts[$i]->parameters as $object) {
                                    if(strtolower($object->attribute) == 'name') {
                                        $attachments[$i]['is_attachment'] = true;
                                        $attachments[$i]['name'] = $object->value;
                                    }
                                }
                            }

                            if($attachments[$i]['is_attachment']) {
                                $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);

                                /* 3 = BASE64 encoding */
                                if($structure->parts[$i]->encoding == 3) { 
                                    $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                                }
                                /* 4 = QUOTED-PRINTABLE encoding */
                                elseif($structure->parts[$i]->encoding == 4) 
                                { 
                                    $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                                }
                            }
                        }
                    }

                    /* iterate through each attachment and save it */
                    foreach($attachments as $attachment)
                    {
                        if($attachment['is_attachment'] == 1)
                        {
                            $filename = $attachment['name'];
                            if(empty($filename)) $filename = $attachment['filename'];

                            if(empty($filename)) $filename = time() . ".dat";
                            $folder = "adjuntos";
                            if(!is_dir($folder)) {
                                 mkdir($folder);
                            }
                            $fp = fopen("./". $folder ."/". $email_number . "-" . $filename, "w+");
                            fwrite($fp, $attachment['attachment']);
                            fclose($fp);
                        }
                    }
                }
            } 

            /* close the connection */
            imap_close($inbox);
        }
    }
