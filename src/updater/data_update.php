<?php

   /*
    * data_update.php
    *                                       __       HZKnight free PHP Scripts    _    vs 5.1
    *                                      / _| __ _ _ __   /\ /\___  _   _ _ __ | |_ ___ _ __
    *                                     | |_ / _` | '_ \ / //_/ _ \| | | | '_ \| __/ _ \ '__|
    *                                     |  _| (_| | | | / __ \ (_) | |_| | | | | ||  __/ |
    *                                     |_|  \__,_|_| |_\/  \/\___/ \__,_|_| |_|\__\___|_|
    *
    *                                           lucliscio <lucliscio@h0model.org>, ITALY
    *
    * -------------------------------------------------------------------------------------------
    * Documentazione di riferimento
    * -------------------------------------------------------------------------------------------
    * license.txt - le condizioni di utilizzo, modifica e redistribuzione per l'utente finale
    *  manual.txt - la guida alla configurazione, all'installazione e all'uso dello script
    *    faqs.txt - le risposte alle domande più comuni, sui problemi e sulle funzionalità
    * history.txt - la progressione delle versioni, i miglioramenti apportati e i bugs eliminati
    *
    * -------------------------------------------------------------------------------------------
    * Licence
    * -------------------------------------------------------------------------------------------
    * Copyright (C)2024 HZKnight
    *
    * This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU Affero General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    *
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
    *
    * You should have received a copy of the GNU Affero General Public License
    * along with this program.  If not, see <http://www.gnu.org/licenses/agpl-3.0.html>.
    */

    /**
     * Modulo per l'aggiornamento dei file dati al nuovo formato.
     *
     *  @author  lucliscio <lucliscio@h0model.org>
     *  @version v 1.0
     *  @copyright Copyright 2024 HZKnight
     *  @license http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL3
     *
     *  @package fanKounter
     *  @filesource
     */
    
    require_once ('sys.inc.php');
    require_once ('dic.inc.php');
    require_once ('components/engine.class.php');
       
    $engine = new Engine();

    $files = new DirectoryIterator('data');
    _mkdir_("data/old"); //Cartella di archiviazione vecchi file

    var_dump($files);

    foreach($files as $file) {
        var_dump($file);
        $ext = $file->getExtension();
        if($ext == "php"){

            $dataName = $file->getBasename(".$ext");

            echo "AGGIORNO $dataName (".$file->getPathname().") --------------------------------------------------------<br>";
            
            require_once ($file->getPathname());

            // Riscrivo $dat__engine nel nuono formato
            $tmp_engine = array();
            foreach($dat__engine as $__url=>$__visites){
                $urlex = explode(".", $__url);
                $name =$urlex[count($urlex)-2];

                $lang = $engine->getLanguage($__url, $inf__engine[$name]['ext']);
                
                if($lang != ""){
                    $name = $name." ".$lang;
                }
                
                $tmp_engine[ucfirst($name)] = $__visites;
            }

            // Cerco i motori di ricerca erroneamente indicizzati come semplici refer
            $tmp_refer = array();
            foreach($dat__referrer as $__url=>$__visites){

                $url = urldecode($__url);

                $result = $engine->isSearchEngine($url);
                
                if($result['status']){
                    $tmp_engine[$result['name']] = $__visites;
                } else {
                    $tmp_refer[$__url] = $__visites;
                }
            }

            //Ordino i motori di ricerca
            arsort($tmp_engine);

            //Genero il nuovo file dati
            $newData = array(
                'dat__counter'  => $dat__counter,
                'dat__started'  => $dat__started,
                'dat__cuttime'  => $dat__cuttime,
                'dat__calendar' => $dat__calendar,
                'dat__day'      => $dat__day,
                'dat__time'     => $dat__time,
                'dat__country'  => $dat__country,
                'dat__browser'  => $dat__browser,
                'dat__os'       => $dat__os,
                'dat__provider' => $dat__provider,
                'dat__location' => $dat__location,
                'dat__referrer' => $tmp_refer,
                'dat__engine'   => $tmp_engine,
                'dat__enkey'    => $dat__enkey,
                'dat__entry'    => $dat__entry
            );

            //Salvo il nuovo file dati
            $status = file_put_contents("./data/$dataName.json", json_encode($newData));
            if(!$status){
                throw new Exception("$dataName non sicrivibile",123);
            }
            
            //Pulisco per evitare sovrapposizioni tra i contatori
            unset($dat__entry);

            //Archivio il file originale
            $dest = "data/old/$dataName.php";

            _fcopy_($file->getPathname(), $dest);
            _fdel_($file->getPathname());
        }
    }

    

