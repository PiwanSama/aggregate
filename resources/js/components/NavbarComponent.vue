<template>
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
  <div class="container-fluid">
    <router-link to = "/" class="navbar-brand text-light">Aggregate</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <router-link to = "/a-level-points" class="nav-item nav-link">My Grades</router-link>
        </li>
        <li class="nav-item">
            <router-link to = "/universities" class="nav-item nav-link">Explore Universities</router-link>
        </li>
        <li class="nav-item">
            <a href = "#" class="nav-item nav-link">Scholarships</a>
        </li>
        <li class="nav-item">
          <router-link to = "/account" class="nav-item nav-link">My Account</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>

<script>

export default {
    name : "navbar"
}

</script>
