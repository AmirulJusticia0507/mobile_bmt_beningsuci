<?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $currentPage = basename($_SERVER['PHP_SELF']); // Mendapatkan halaman saat ini
                
                    switch ($page) {
                        case 'productsimpanan':
                            if ($currentPage !== 'productsimpanan.php') {
                                header("Location: productsimpanan.php?page=productsimpanan");
                                exit;
                            }
                            break;
                
                        case 'ceksaldo':
                            if ($currentPage !== 'ceksaldo.php') {
                                header("Location: ceksaldo.php?page=ceksaldo");
                                exit;
                            }
                            break;
                
                
                        case 'rekapdatanasabah.php':
                            if ($currentPage !== 'rekapdatanasabah.php.php') {
                                header("Location: rekapdatanasabah.php.php?page=rekapdatanasabah.php");
                                exit;
                            }
                            break;
                
                        case 'dashboard':
                            if ($currentPage !== 'index.php') {
                                header("Location: index.php?page=dashboard");
                                exit;
                            }
                            break;
                
                        default:
                            // Handle cases for other pages or provide a default action
                            break;
                    }
                }
                ?>