<!-- Sidebar Start -->

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('manager.dashboard') }}" aria-expanded="false">
                  <span>
                    <i class="fa-duotone fa-house"></i>
                  </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow " href="#" aria-expanded="false">
                          <span class="d-flex">
                            <i class="fa-duotone fa-note"></i>
                          </span>
                        <span class="hide-menu">Suscriptiones</span>
                    </a>


                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('manager.subscribers') }}" class="sidebar-link">
                                <span class="hide-menu">Suscriptiones </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('manager.subscribers.lists') }}" class="sidebar-link">
                                <span class="hide-menu">Listas</span>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow " href="#" aria-expanded="false">
                          <span class="d-flex">
                            <i class="fa-duotone fa-note"></i>
                          </span>
                        <span class="hide-menu">Campañas</span>
                    </a>


                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('manager.campaigns') }}" class="sidebar-link">
                                <span class="hide-menu">Campañas </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('manager.maillists') }}" class="sidebar-link">
                                <span class="hide-menu">Listas</span>
                            </a>
                        </li>
                    </ul>

                </li>



                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('manager.products') }}" aria-expanded="false">
                          <span class="d-flex">
                          <i class="fa-sharp-duotone fa-solid fa-typewriter"></i>
                          </span>
                        <span class="hide-menu">Productos</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('manager.users') }}" aria-expanded="false">
                          <span class="d-flex">
                           <i class="fa-duotone fa-user"></i>
                          </span>
                        <span class="hide-menu">Usuarios</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow " href="#" aria-expanded="false">
                          <span class="d-flex">
                           <i class="fa-duotone fa-gear-code"></i>
                          </span>
                        <span class="hide-menu">Configuración</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.settings') }}" aria-expanded="false">
                                <span>
                                  <i class="ti ti-circle"></i>
                                </span>
                                <span class="hide-menu">Configuración</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.settings.emails') }}" aria-expanded="false">
                                  <span>
                                    <i class="ti ti-circle"></i>
                                  </span>
                                <span class="hide-menu">Smtp</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.services') }}" aria-expanded="false">
                                  <span>
                                    <i class="ti ti-circle"></i>
                                  </span>
                                <span class="hide-menu">Servicios</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.settings.maintenance') }}" aria-expanded="false">
                              <span>
                                <i class="ti ti-circle"></i>
                              </span>
                                <span class="hide-menu">Mantenimiento</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.templates') }}" aria-expanded="false">
                                  <span>
                                    <i class="ti ti-circle"></i>
                                  </span>
                                <span class="hide-menu">Plantillas campaña</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link"  href="{{ route('manager.layouts') }}" aria-expanded="false">
                                  <span>
                                    <i class="ti ti-circle"></i>
                                  </span>
                                <span class="hide-menu">Plantilla correos</span>
                            </a>
                        </li>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>

</aside>

<!-- Sidebar End -->

