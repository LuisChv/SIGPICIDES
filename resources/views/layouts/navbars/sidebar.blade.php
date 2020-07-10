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
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-molecule-40"></i>
                    <p>{{ __('Mis proyectos') }}</p>
                </a>
            </li>
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
                                <p>{{ __('Enviar solicitud') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('solicitud.consultar')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Historial') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#solicitudes" aria-expanded="false">
                    <i class="tim-icons icon-email-85" ></i>
                    <span class="nav-link-text" >{{ __('Solicitudes') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="solicitudes">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-check-2"></i>
                                <p>{{ __('Solicitudes a evaluar') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#investigaciones" aria-expanded="false">
                    <i class="tim-icons icon-atom" ></i>
                    <span class="nav-link-text" >{{ __('Investigaciones') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="investigaciones">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Consultar') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-tag"></i>
                                <p>{{ __('Tipos de investigación') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>{{ __('Estadisticas') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Usuarios') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-laptop"></i>
                    <p>{{ __('Recursos') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
