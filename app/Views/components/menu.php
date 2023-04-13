<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link elevation-4">
        <img src="{$baseurl}assets/images/logo-onanmedia.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>ONANMEDIA PANEL</b></span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{$baseurl}assets/images/user-warna-2.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{$session.nama_lengkap|default:'User Panel'} 
                    <br/>
                    <small><span class="right badge badge-success">Online</span></small>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {foreach from=$menu item=x}
                    {if $x.type_menu eq 'PC'}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="{$x.icon_menu}"></i>
                            <p>
                                {$x.parent}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {foreach from=$x.child item=y}
                                {if $y.type_menu eq 'C'}
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link" onClick="loadUrl('{$baseurl}{$y.url}');">
                                            <i class="{$y.icon_menu}"></i>
                                            <p>{$y.menu}</p>
                                        </a>
                                    </li>
                                {elseif $y.type_menu eq 'CHC'}
                                    
                                {/if}
                            {/foreach}
                        </ul>
                    </li>	
                    {elseif $x.type_menu eq 'P'}
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link" onClick="loadUrl('{$baseurl}{$x.url}');">
                                <i class="{$x.icon_menu}"></i>
                                <p>{$x.parent}</p>
                            </a>
                        </li>
                    {/if}
                {/foreach}    

            </ul>
        </nav>

    </div>

</aside>