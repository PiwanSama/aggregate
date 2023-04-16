<template>
        <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <router-link to = "/" class="navbar-brand text-dark">Aggregate</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    </div>
  </div>
</nav>
</template>

<style scoped>

.navbar{
    background: #fff !important;
    box-shadow: 0 2px 2px rgba(63,92,110,.15);;
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


.navbar-nav .nav-link.active::before, .nav-link:hover::before, .nav-link:focus::before {
    transform-origin: left top;
    transform: scale(1, 1);
}


.nav-link {
    position: relative;
    text-decoration: none;
    transition: color 0.1s,background-color 0.1s,padding 0.2s ease-in;
    font-size: 15px !important;
    margin: 5px;
}

.navbar-nav .nav-link.active, .nav-link:hover, .nav-link:focus{
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
