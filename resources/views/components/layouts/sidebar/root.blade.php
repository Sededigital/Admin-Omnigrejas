<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ url('/dashboard-admin') }}" class="navbar-brand">

            {{-- Logo start --}}
            <div class="logo-main">
                <div class="logo-normal">
                    <img src="{{ asset('system/img/logo-system/icon-admin-blue.png') }}" class="icon-40" alt=""   width="400" height="330">
                </div>
                <div class="logo-mini">
                    <img src="{{ asset('system/img/logo-system/icon-admin-blue.png') }}" class="icon-40" alt=""   width="400" height="330">
                </div>
            </div>
            {{-- logo End --}}


            <h4 class="logo-title fw-bold">
                <span class="text-primary">Omn</span><span class="text-success">Igrejas</span>
            </h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar ">

        <div class="sidebar-list">
             {{-- Sidebar Menu Start  --}}
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard-admin') }}" wire:navigate wire:current="active">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" fill="currentColor"/>
                            </svg>
                        </i>
                        <span class="item-name">Painel principal</span>
                    </a>
                </li>

                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1" >
                        <span class="default-icon">Gestão Organizacional</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false" aria-controls="sidebar-special">
                        <i class="icon">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M12 2C12.5523 2 13 2.44772 13 3V4.126C14.0978 4.42376 15.0978 4.95149 15.9393 5.70711L16.9393 5.06066C17.3787 4.77805 17.9726 4.89995 18.2552 5.33934L19.3393 7.06066C19.6219 7.50005 19.5 8.09392 19.0607 8.37653L18.0607 9.023C18.435 9.92125 18.635 10.9212 18.635 11.9999C18.635 13.0787 18.435 14.0787 18.0607 14.977L19.0607 15.6235C19.5 15.9061 19.6219 16.5 19.3393 16.9393L18.2552 18.6606C17.9726 19.1 17.3787 19.2219 16.9393 18.9393L15.9393 18.2929C15.0978 19.0485 14.0978 19.5762 13 19.874V21C13 21.5523 12.5523 22 12 22H11C10.4477 22 10 21.5523 10 21V19.874C8.90218 19.5762 7.90218 19.0485 7.06066 18.2929L6.06066 18.9393C5.62127 19.2219 5.0274 19.1 4.74479 18.6606L3.66066 16.9393C3.37805 16.5 3.5 15.9061 3.93934 15.6235L4.93934 14.977C4.56502 14.0787 4.36502 13.0787 4.36502 11.9999C4.36502 10.9212 4.56502 9.92125 4.93934 9.023L3.93934 8.37653C3.5 8.09392 3.37805 7.50005 3.66066 7.06066L4.74479 5.33934C5.0274 4.89995 5.62127 4.77805 6.06066 5.06066L7.06066 5.70711C7.90218 4.95149 8.90218 4.42376 10 4.126V3C10 2.44772 10.4477 2 11 2H12Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z" fill="currentColor"/>
                            </svg>
                        </i>
                        <span class="item-name">Gerenciar</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>

                    <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('geral/list-users') }}" wire:navigate wire:current='active'>
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> U </i>
                                <span class="item-name">Usuários</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="" wire:navigate wire:current="active">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> I </i>
                                <span class="item-name">Igrejas</span>
                            </a>
                        </li>


                    </ul>
                </li>



                    <li class="nav-item">
                        <a class="nav-link " href="" wire:navigate wire:current="active">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" fill="currentColor"/>
                                    <path d="M19 8H5v11h14V8z" fill="currentColor"/>
                                    <path d="M7 10h2v2H7v-2zm4 0h2v2h-2v-2zm4 0h2v2h-2v-2z" fill="currentColor"/>
                                </svg>
                            </i>
                            <i class="sidenav-mini-icon"> V </i>
                            <span class="item-name">Calendário</span>
                        </a>
                    </li>

                    <li><hr class="hr-horizontal"></li>


                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Gestão Financeira</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-widget" role="button" aria-expanded="false" aria-controls="sidebar-widget">
                        <i class="icon">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M21.25 13.4764C20.429 13.4764 19.761 12.8145 19.761 12.001C19.761 11.1865 20.429 10.5246 21.25 10.5246C21.449 10.5246 21.64 10.4463 21.78 10.3076C21.921 10.1679 22 9.97864 22 9.78146L21.999 7.10415C21.999 4.84102 20.14 3 17.856 3H6.144C3.86 3 2.001 4.84102 2.001 7.10415L2 9.86766C2 10.0648 2.079 10.2541 2.22 10.3938C2.36 10.5325 2.551 10.6108 2.75 10.6108C3.599 10.6108 4.239 11.2083 4.239 12.001C4.239 12.8145 3.571 13.4764 2.75 13.4764C2.336 13.4764 2 13.8093 2 14.2195V16.8949C2 19.158 3.858 21 6.143 21H17.857C20.142 21 22 19.158 22 16.8949V14.2195C22 13.8093 21.664 13.4764 21.25 13.4764Z" fill="currentColor"></path>
                                <path d="M15.4303 11.5887L14.2513 12.7367L14.5303 14.3597C14.5783 14.6407 14.4653 14.9177 14.2343 15.0837C14.0053 15.2517 13.7063 15.2727 13.4543 15.1387L11.9993 14.3737L10.5413 15.1397C10.4333 15.1967 10.3153 15.2267 10.1983 15.2267C10.0453 15.2267 9.89434 15.1787 9.76434 15.0847C9.53434 14.9177 9.42134 14.6407 9.46934 14.3597L9.74734 12.7367L8.56834 11.5887C8.36434 11.3907 8.29334 11.0997 8.38134 10.8287C8.47034 10.5587 8.70034 10.3667 8.98134 10.3267L10.6073 10.0897L11.3363 8.61268C11.4633 8.35868 11.7173 8.20068 11.9993 8.20068H12.0013C12.2843 8.20168 12.5383 8.35968 12.6633 8.61368L13.3923 10.0897L15.0213 10.3277C15.2993 10.3667 15.5293 10.5587 15.6173 10.8287C15.7063 11.0997 15.6353 11.3907 15.4303 11.5887Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Gerenciar</span>
                        <i class="right-icon">
                            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="sidebar-widget" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link " href="" wire:navigate wire:current="active">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> MF </i>
                                <span class="item-name">Movimentos Financeiros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="" wire:navigate wire:current="active">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> CF </i>
                                <span class="item-name">Categorias Financeiras</span>
                            </a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link " href="" wire:navigate wire:current="active">
                                <i class="icon">
                                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> R </i>
                                <span class="item-name">Relatórios Financeiros</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li><hr class="hr-horizontal"></li>


            </ul>

        </div>

            {{-- Sidebar Menu End         --}}
    </div>
    <div class="sidebar-footer"></div>
</aside>
