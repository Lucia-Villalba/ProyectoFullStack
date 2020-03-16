<nav id="nav2">
  <nav class="navbar navbar-expand-lg navbar-light">
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


        <!--Desplegable PRODUCTOS
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                PRODUCTOS
            </a>-->
            <!-- Contenido de PRODUCTOS
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="productos.php">Sección 1</a>
                <div class="dropdown-divider"></div> -->
                <!--divisor
                <a class="dropdown-item" href="productos.php">Sección 2</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="productos.php">Sección 3</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="productos.php">Sección 4</a>
            </div>
        </li>-->

        <li class="nav-item">
            <a class="nav-link" href="/productos" tabindex="-1" aria-disabled="true">PRODUCTOS</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/faq" tabindex="-1" aria-disabled="true">FAQ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contacto" tabindex="-1" aria-disabled="true">CONTACTO</a>
        </li>
        <form class="form-inline my-2 my-lg-0">
          <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Buscar"
          aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i>
          </button>
        </form>
      </ul>
    </div>
  </nav>

  <!--administrador-->
  @auth
  @if(Auth::user()->role == 'admin')
    <nav class="navbar navbar-expand-lg navbar-light" id="admin">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a
              class="nav-link"
              href="/adminProductos"
              tabindex="-1"
              aria-disabled="true"
              >ADMIN PRODUCTOS
              </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="/adminMarcas"
              tabindex="-1"
              aria-disabled="true"
              >ADMIN MARCAS</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="/adminCategorias"
              tabindex="-1"
              aria-disabled="true"
              >ADMIN CATEGORIAS</a>
          </li>
        </ul>


    </nav>
    @elseif(Auth::user()->role = 'user')
    <h1 style='color:white'>Soy usuario</h1>
  @endif
  
@endauth

