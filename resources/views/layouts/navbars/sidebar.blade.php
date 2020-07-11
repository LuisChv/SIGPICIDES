<div class="sidebar" data-color = "primary">
    <div class="sidebar-wrapper">
        <div class="logo">
            <!--a href="#" class="simple-text logo-mini">{{ __('BD') }}</a-->
            <!--a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a-->
            <br/>
            <a href="{{ route('home') }}"><img src="black/img/cidesv3.jpg" class=logo1></a>
            <br/>
        </div>
        <ul class="nav">
        
            @can('roles.index')
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('roles.index') }}">
                    <i class="tim-icons icon-molecule-40"></i>
                    <p>{{ __('Roles') }}</p>
                </a>
            </li>
            @endcan

            @can('proyectos.index')
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('proyectos.index') }}">
                    <i class="tim-icons icon-molecule-40"></i>
                    <p>{{ __('Mis proyectos') }}</p>
                </a>
            </li>
            @endcan

            @can('solicitudes.index')
            <li>
                <a data-toggle="collapse" href="#misSolicitudes" aria-expanded="false">
                    <i class="tim-icons icon-shape-star" ></i>
                    <span class="nav-link-text" >{{ __('Mis solicitudes') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="misSolicitudes">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>


                            <a href="{{ route('solicitud.registro')  }}">
                                <i class="tim-icons icon-send"></i>
                                <p>{{ __('Consultar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('solicitud.consultar')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
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
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('solicitudes.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-check-2"></i>
                                <p>{{ __('Solicitudes a evaluar') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('indicadores.index')
            <li>
                <a data-toggle="collapse" href="#investigaciones" aria-expanded="false">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >{{ __('Indicadores') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="investigaciones">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-tag"></i>
                                <p>{{ __('Tipos de indicadores') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
           
            @can('users.index')
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('users.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Usuarios') }}</p>
                </a>
            </li>
            @endcan

            @can('recursos.index')
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('recursos.index') }}">

                    <i class="tim-icons icon-laptop"></i>
                    <p>{{ __('Recursos') }}</p>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>
