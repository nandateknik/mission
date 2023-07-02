<?php
$menu = $this->db->get('menu')->result();
$i=0;
?>

<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light sidebar-shadow" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                            
                            <?php foreach ($menu as $list) :?>
                                <?php 
                                    $submenu =  $this->db->get_where('sub_menu', ["id_menu" => $list->id])->result();
                                    $urut = $i++;
                                ?>
                                <a class="nav-link collapsed" href="<?=base_url($list->link)?>"  <?php if ($submenu):?> data-toggle="collapse" data-target="#collapseLayouts<?=$urut?>"<?php endif;?>
                                    aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="<?=$list->icon?>"></i></div>
                                    <?=$list->menu; ?>
                                    <?php if ($submenu):?>
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    <?php endif;?>
                                </a>
                                <?php if ($submenu):?>
                                <div class="collapse" id="collapseLayouts<?=$urut?>" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav bg-sub">
                                <?php foreach ($submenu as $child) :?>
                                        <a class="nav-link" href="<?=base_url($child->link)?>"><?=$child->submenu?></a>
                                <?php endforeach;?>
                                </nav>
                                </div>
                                <?php endif;?>
                            <?php endforeach;?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?=$this->session->nama; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">