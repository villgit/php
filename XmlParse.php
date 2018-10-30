<?php
/**
 * Created by PhpStorm.
 * User: vill.labrador
 * Date: 30/10/2018
 * Time: 11:23 AM
 */

class XmlParse{
    public $xml_sample = '<People>
                            <Person>
                                <LastName>Duterte</LastName>
                                <MiddleName>Roa</MiddleName>
                                <FirstName>Rodrigo</FirstName>
                            </Person>
                            <Person>
                                <LastName>Carpio</LastName>
                                <MiddleName>Duterte</MiddleName>
                                <FirstName>Sara</FirstName>
                            </Person>
                          </People>';

    public function xmlString(){
        $PeopleXML = simplexml_load_string($this->xml_sample);

        foreach ($PeopleXML->Person as $val) {
            $Person[] = array(
                'LastName' => $this->checkProperty($val, 'LastName'),
                'MiddleName' => $this->checkProperty($val, 'MiddleName'),
                'FirstName' => $this->checkProperty($val, 'FirstName'),
            );
        }

        return $Person;
    }

    public function checkProperty($object, $property){
        if($object->{$property}){
            return (string) $object->{$property};
        }else{
            return (string) NULL;
        }
    }
}