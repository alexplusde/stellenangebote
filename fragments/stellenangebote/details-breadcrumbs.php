
<!-- Sollen die Breadcrumbs auch ausgelagergt werden? !-->
<div>
    <div class="container breadcrumb-container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <ol class="breadcrumb cs-breadcrumb" itemtype="https://schema.org/BreadcrumbList"
                    itemscope="" aria-label="Navigationsstruktur">
                    <li class="breadcrumb-item cs-level-1" itemprop="itemListElement"
                        itemtype="https://schema.org/ListItem" itemscope="">
                        <a itemprop="item" aria-label="Startseite" href="/">
                            <!-- <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 17" xml:space="preserve" width="31.3" height="28">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10,1.7C9.7,1.5,9.3,1.5,9,1.7L4,5.4v9.2c0,0.4,0.4,0.8,0.8,0.8h1.6v-4.7 c0-1.3,1.1-2.4,2.4-2.4h1.6c1.3,0,2.4,1.1,2.4,2.4v4.7h1.6c0.4,0,0.8-0.4,0.8-0.8V5.4L10,1.7z M16.6,6.6l1.1,0.8 c0.4,0.3,0.8,0.2,1.1-0.2c0.3-0.4,0.2-0.8-0.2-1.1l-7.8-5.7c-0.8-0.6-2-0.6-2.8,0L0.3,6.1C0,6.4-0.1,6.9,0.2,7.2 c0.3,0.4,0.8,0.4,1.1,0.2l1.1-0.8v8.1C2.4,16,3.4,17,4.7,17h9.5c1.3,0,2.4-1.1,2.4-2.4V6.6z M11.1,15.5v-4.7 c0-0.4-0.4-0.8-0.8-0.8H8.7c-0.4,0-0.8,0.4-0.8,0.8v4.7H11.1L11.1,15.5z"></path>
                                </svg> -->
                            <span itemprop="name">Startseite</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li class="breadcrumb-item cs-level-1" itemprop="itemListElement"
                        itemtype="https://schema.org/ListItem" itemscope="">
                        <a itemprop="item" aria-label="Jobbörse" href="/jobs/jobboerse/">
                            <span itemprop="name">Jobbörse</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li class="breadcrumb-item cs-level-1 shrink" itemprop="itemListElement"
                        itemtype="https://schema.org/ListItem" itemscope="">
                        <span itemprop="name"><?= $c_title ?></span>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--  Breadcrumbs Ende !-->
