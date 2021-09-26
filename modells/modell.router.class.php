<?php

class AdminSiteRouter {
    
    public function router ( $url ) {

            if ( $url == 'arajanlatok' ) {
                return 'components/component.arajanlatok.php';
            }
                else if ( $url == 'partnerek' ) {
                    return 'components/component.partnerek.table.php';
                }
                    else if ( $url == 'gyartok' ) {
                        return 'components/component.gyartok.php';
                    }
                        else if ( $url == 'termekcsoportok' ) {
                            return 'components/component.termekcsoportok.php';
                        }
                            else if ( $url == 'termekkategoriak' ) {
                                return 'components/component.termekkategoriak.php';
                            }
                                else if ( $url == 'termekek' ) {
                                    return 'components/component.termekek.php';
                                } 
                                    else if ( $url == 'kijelentkezes') {
                                        header ('Location: controllers/control.logout.php');
                                    }
                                        else  {
                                            return 'components/component.admin.php';
                                        }
    }

}