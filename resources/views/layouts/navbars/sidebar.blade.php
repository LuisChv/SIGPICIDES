<div class="sidebar" data-color = "primary">
    <div class="sidebar-wrapper">
        <div class="logo">
            <!--a href="#" class="simple-text logo-mini">{{ __('BD') }}</a-->
            <!--a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a-->
            <br/>
            <a href="{{ route('home') }}"><img src="/black/img/cidesv3.jpg" class=logo1></a>
            <br/>
        </div>
        <ul class="nav">

            @canany(['proyectos.index', 'tipo_de_investigacion.index', 'mis_proyectos'])
                <li>
                    <a data-toggle="collapse" href="#proyectos" aria-expanded="false">
                        <i class="tim-icons icon-molecule-40" ></i>
                        <span class="nav-link-text" >{{ __('Proyectos') }}</span>
                        <b class="caret mt-1"></b>
                    </a>

                    <div class="collapse" id="proyectos">
                        <ul class="nav pl-4">
                            @can('mis_proyectos')
                                <li @if ($pageSlug == 'mis_proyectos') class="active " @endif>
                                    <a href="{{ route('home')  }}">
                                        <i class="tim-icons icon-shape-star"></i>
                                        <p>{{ __('Mis proyectos') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('proyectos.index')
                                <li @if ($pageSlug == 'proyectos') class="active " @endif>
                                    <a href="{{ route('home')  }}">
                                        <i class="tim-icons icon-bullet-list-67"></i>
                                        <p>{{ __('Consultar proyectos') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('tipo_de_investigacion.index')
                                <li @if ($pageSlug == 'tipos_de_investigacion') class="active " @endif>
                                    <a href="{{ route('tipo_investigacion.index')  }}">
                                        <i class="tim-icons icon-tag"></i>
                                        <p>{{ __('Tipos de investigación') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcanany 

            @canany(['solicitudes.index', 'mis_solicitudes', 'solicitudes.create'])
            <li>
                <a data-toggle="collapse" href="#solicitudes" aria-expanded="false">
                    <i class="tim-icons icon-email-85" ></i>
                    <span class="nav-link-text" >{{ __('Solicitudes') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="solicitudes">
                    <ul class="nav pl-4">
                        @can('solicitudes.index')
                            <li @if ($pageSlug == 'solicitudes') class="active " @endif>
                                <a href="{{ route('home') }}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ __('Consultar solicitudes') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'solicitudes_a_evaluar') class="active " @endif>
                                <a href="{{ route('home')  }}">
                                    <i class="tim-icons icon-check-2"></i>
                                    <p>{{ __('Solicitudes a evaluar') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('mis_solicitudes')
                            <li @if ($pageSlug == 'mis_solicitudes') class="active " @endif>
                                <a href="{{ route('home')  }}">
                                    <i class="tim-icons icon-shape-star"></i>
                                    <p>{{ __('Mis solicitudes') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('solicitudes.create')
                            <li @if ($pageSlug == 'enviar_solicitud') class="active " @endif>
                                <a href="{{ route('home')  }}">
                                    <i class="tim-icons icon-send"></i>
                                    <p>{{ __('Enviar solicitud') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany      
            
            @can('recursos.index')
                <li @if ($pageSlug == 'recursos') class="active " @endif>
                    <a href="{{ route('recursos.index') }}">
                        <i class="tim-icons icon-laptop"></i>
                        <p>{{ __('Recursos') }}</p>
                    </a>
                </li>
            @endcan

            @can('recursos.index')
                <li @if ($pageSlug == 'informes') class="active " @endif>
                    <a href="{{ route('home')  }}">
                        <i class="tim-icons icon-chart-bar-32"></i>
                        <p>{{ __('Informes') }}</p>
                    </a>
                </li>
            @endcan

            @canany(['users.index', 'roles.index', 'permission.index'])
            <li>
                <a data-toggle="collapse" href="#seguridad" aria-expanded="false">
                    <i class="tim-icons icon-lock-circle" ></i>
                    <span class="nav-link-text" >{{ __('Seguridad') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="seguridad">
                    <ul class="nav pl-4">
                        @can('users.index')
                            <li @if ($pageSlug == 'usuarios') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ __('Usuarios') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('roles.index')
                            <li @if ($pageSlug == 'permisos') class="active " @endif>

                                <a href="{{ route('roles.index') }}">
                                    <i class="tim-icons icon-badge"></i>
                                    <p>{{ __('Roles') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany     
        </ul>
    </div>
</div>
