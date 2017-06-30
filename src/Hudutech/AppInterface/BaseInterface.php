<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/30/17
 * Time: 10:02 AM
 */

namespace Hudutech\AppInterface;



interface BaseInterface
{
    public static function delete($txnId);
    public static function getId($txnId);
    public static function getObject($id);
    public static function all();
}