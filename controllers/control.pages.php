<?php 
                    if ( $_GET [ 'adminPage' == 'arajanlatok'] ) {
                        include 'components/component.arajanlatok.admin.php';
                    }
                    if ( $_GET [ 'adminPage' == 'partnerek'] ) {
                        include 'components/component.partnerek.table.php';
                    }
                    if ( $_GET [ 'adminPage' == 'gyartok'] ) {
                        include 'components/component.gyartok.php';
                    }
                    if ( $_GET [ 'adminPage' == 'termekcsoportok'] ) {
                        include 'components/component.termekcsoportok.php';
                    }
                    if ( $_GET [ 'adminPage' == 'termekkategoriak'] ) {
                        include 'components/component.termekkategoriak.php';
                    }
                    if ( $_GET [ 'adminPage' == 'termekek'] ) {
                        include 'components/component.termekek.php';
                    }
                        ?>