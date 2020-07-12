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

            @can('proyectos.index')
            <li>
                <a data-toggle="collapse" href="#misProyectos" aria-expanded="false">
                    <i class="tim-icons icon-molecule-40" ></i>
                    <span class="nav-link-text" >{{ __('Mis proyectos') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="misProyectos">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'mis_proyectos') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar proyectos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'mis_solicitudes') class="active " @endif>
                            <a href="{{ route('solicitud.consultar')  }}">
                                <i class="tim-icons icon-email-85"></i>
                                <p>{{ __('Solicitudes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'enviar_solicitud') class="active " @endif>
                            <a href="{{ route('solicitud.registro')  }}">
                                <i class="tim-icons icon-send"></i>
                                <p>{{ __('Enviar solicitud') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('solicitudes.index')
            <li>
                <a data-toggle="collapse" href="#solicitudes" aria-expanded="false">
                    <i class="tim-icons icon-email-85" ></i>
                    <span class="nav-link-text" >{{ __('Solicitudes') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="solicitudes">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'solicitudes') class="active " @endif>
                            <a href="{{ route('solicitudes.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar solicitudes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'solicitudes_a_evaluar') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-check-2"></i>
                                <p>{{ __('Solicitudes a evaluar') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('investigacion.index')
            <li>
                <a data-toggle="collapse" href="#investigaciones" aria-expanded="false">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >{{ __('Investigaciones') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="investigaciones">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'investigaciones') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Ver investigaciones') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'tipos_de_investigacion') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-tag"></i>
                                <p>{{ __('Tipos de investigacion') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan          
            
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
                <a href="{{ route('recursos.index') }}">

                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>{{ __('Informes') }}</p>
                </a>
            </li>
            @endcan

            @can('user.index')
            <li>
                <a data-toggle="collapse" href="#seguridad" aria-expanded="false">
                    <i class="tim-icons icon-lock-circle" ></i>
                    <span class="nav-link-text" >{{ __('Seguridad') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="seguridad">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'usuarios') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Usuarios') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'roles') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-badge"></i>
                                <p>{{ __('Roles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'permisos') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-key-25"></i>
                                <p>{{ __('Permisos') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan        
        </ul>
    </div>
</div>
