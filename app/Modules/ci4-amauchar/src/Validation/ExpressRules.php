<?php
namespace  Amauchar\Core\Validation;


class ExpressRules{

    // Rule is to validate mobile number digits
    public function mobileValidation(string $str, string $fields, array $data){
        
        if(isset($data['phone_mobile']) && !empty($data['phone_mobile'])){
           
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

            try {
                $swissNumberProto = $phoneUtil->parse($data['phone_mobile'],  $data['country']);
                if (!$phoneUtil->isValidNumber($swissNumberProto)) {
                    return false;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        }

        if(isset($data['contact']['phone_mobile']) && !empty($data['contact']['phone_mobile'])){

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

            try {
                $swissNumberProto = $phoneUtil->parse($data['contact']['phone_mobile'],  $data['contact']['country']);
                if (!$phoneUtil->isValidNumber($swissNumberProto)) {
                    return false;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        }
    }

      // Rule is to validate mobile number digits
      public function phoneValidation(string $str, string $fields, array $data){

       // print_r($data); exit;
        
        if(isset($data['phone']) && !empty($data['phone'])){

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

            try {
                $swissNumberProto = $phoneUtil->parse($data['phone'],  $data['country']);
                if (!$phoneUtil->isValidNumber($swissNumberProto)) {
                    return false;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        }

        if(isset($data['address']['phone']) && !empty($data['address']['phone'])){

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

            try {
                $swissNumberProto = $phoneUtil->parse($data['address']['phone'],  $data['address']['country']);
                if (!$phoneUtil->isValidNumber($swissNumberProto)) {
                    return false;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        }

        if(isset($data['contact']['phone']) && !empty($data['contact']['phone'])){

            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

            try {
                $swissNumberProto = $phoneUtil->parse($data['contact']['phone'],  $data['contact']['country']);
                if (!$phoneUtil->isValidNumber($swissNumberProto)) {
                    return false;
                }
            } catch (\libphonenumber\NumberParseException $e) {
                return false;
            }
        }

    }

      // fonction permettant de contr??ler la validit?? d'un num??ro SIRET
      public function is_siret(string $str, string $fields, array $data){

            if (strlen($data['siret']) != 14) return false; // le SIRET doit contenir 14 caract??res
            if (!is_numeric($data['siret'])) return false; // le SIRET ne doit contenir que des chiffres
    
            // on prend chaque chiffre un par un
            // si son index (position dans la cha??ne en commence ?? 0 au premier caract??re) est pair
            // on double sa valeur et si cette derni??re est sup??rieure ?? 9, on lui retranche 9
            // on ajoute cette valeur ?? la somme totale
            $sum = 0;
            for ($index = 0; $index < 14; $index ++)
            {
                $number = (int) $data['siret'][$index];
                if (($index % 2) == 0) { if (($number *= 2) > 9) $number -= 9; }
                $sum += $number;
            }
    
            // le num??ro est valide si la somme des chiffres est multiple de 10
            if (($sum % 10) != 0) 
                return 3; 
            else 
                return 0;		
      }

}
