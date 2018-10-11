<?php

class Helper
{
    public static function genPassword($length = 10)
    {
        if ($length > 0) {
            $alphas = 'AbBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
            $numbers = '0123456789';
            $signs = '+*%&/()=?!$';

            return substr(str_shuffle($alphas.$numbers.$signs), 0, $length);
        }

        return false;
    }
}

echo Helper::genPassword();
