<?php
    $Options = Array ( 
        "Aves" => Array ( 
            'Não exite' ,
        ) , 
        "Peixes" => Array ( 
            'Ósseo' ,
            'Cartilaginoso'
            
        )
    ) ; 

    foreach ( $Options [ $_GET [ 'option' ] ] as $Item ) {
        printf ( '<option value="%s">%s</option>' , $Item , $Item ) ;
    }