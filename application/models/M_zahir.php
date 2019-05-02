<?php

class M_zahir extends MY_Model
{
    /**
     * @param $page integer page number
     */
    function products()
    {
        $this->zahir->select('ITEMCODE, ITEMNAME, ITEMPRODUCTCATEGORYNAME, ITEMDEFAULT_UOM_CODE');
        $query = $this->zahir->get('PRODUCT_MASTER');

        return $query->result();
    }

    function customers()
    {
        $this->zahir->select('CUSTOMERCODE,CUSTOMERNAME,CUSTOMERADDRESS,CUSTOMERCITY,CUSTOMERPHONE1,CUSTOMERPHONE2');
        $query = $this->zahir->get('CUSTOMER_MASTER');

        return $query->result();
    }
}