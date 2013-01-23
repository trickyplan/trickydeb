<?php

    /* Codeine
     * @author BreathLess
     * @description  
     * @package Codeine
     * @version 7.x
     */


    setFn('Do', function ($Call)
    {

        $Call['Data'] = F::Run('Entity', 'Read', $Call,
                    array(
                         'Entity' => 'Package'
                    ))[0];

        if (!isset($Call['Data']['Meta']['X-Private']) || $Call['Key'] == $Call['Data']['Meta']['X-Private'])
        {
            $Call['Renderer'] = 'View.Download';
            $Call['Output']['Title'] = $Call['Data']['Name'];
            $Call['Output']['File'] = Root.'/Data/Package/'.$Call['Data']['File'];
        }

        return $Call;
    });