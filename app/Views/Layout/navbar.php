<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">My CodeIgniter 4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <!-- jika memakai local develop server root atau php spark bisa tinggal memanggil route nya
                            dengan hanya menuliskan / saja, jika tidak memakai local root server maka harus 
                            menuliskan base url nya
                        -->
                    <a class="nav-link" href="<?= base_url('/'); ?>">Home <span class="<?php
                                                                                        if ($navActive == 'Home') {
                                                                                            echo 'sr-only';
                                                                                        } else {
                                                                                            echo '';
                                                                                        }
                                                                                        ?>(current)"></span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/pages/about">About <span class="<?php
                                                                                if ($navActive == 'About') {
                                                                                    echo 'sr-only';
                                                                                } else {
                                                                                    echo '';
                                                                                }
                                                                                ?>"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/pages/contact">Contact <span class="<?php
                                                                                    if ($navActive == 'Contact') {
                                                                                        echo 'sr-only';
                                                                                    } else {
                                                                                        echo '';
                                                                                    }
                                                                                    ?>"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/Comics">Comics<span class="<?php
                                                                            if ($navActive == 'Comics') {
                                                                                echo 'sr-only';
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                            ?>"></span></a>
                </li>
            </ul>


            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>