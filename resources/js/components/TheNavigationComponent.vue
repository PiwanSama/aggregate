<template>
  <header class="p-2">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <router-link to = "/" class="navbar-brand text-dark d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">Aggregate</router-link>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li class="nav-item">
            <router-link :to = "{
              name : 'ALevelPoints'
            }" class="nav-item nav-link">My Grades</router-link>
          </li>
          <li class="nav-item">
              <router-link :to = "{
                name : 'Universities'
              }" class="nav-item nav-link">Explore Universities</router-link>
          </li>
          <li class="nav-item">
            <router-link :to = "{
                name : 'Login'
              }" class="nav-item nav-link">My Account</router-link>
          </li>
        </ul>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>

header{
    background: #fff !important;
    box-shadow: 0 2px 2px rgba(63,92,110,.15);
}

.navbar-brand {
    color: #247BA0 !important;
    font-size: 26px !important;
    margin-left: 2rem;
}

.nav-link::before {
    content: '';
    display: block;
    position: absolute;
    bottom: 3px;
    left: 0;
    height: 3px;
    width: 100%;
    background-color: #247BA0;
    transform-origin: right top;
    transform: scale(0, 1);
    transition: color 0.1s,transform 0.2s ease-out;
}


.nav-link.active::before, .nav-link:hover::before, .nav-link:focus::before {
    transform-origin: left top;
    transform: scale(1, 1);
}


.nav .nav-link {
    position: relative;
    text-decoration: none;
    transition: color 0.1s,background-color 0.1s,padding 0.2s ease-in;
    font-size: 15px !important;
    margin: 5px;
    color: #247BA0 !important;
}

.nav .nav-link.active, .nav-link:hover, .nav-link:focus{
    color: #247BA0 !important;
    font-weight: 600;
    text-decoration: none;
}

</style>

<script>

export default {
    name : "navigation"
}

</script>
