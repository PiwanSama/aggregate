<template>
   <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <router-link to = "/" class="navbar-brand text-light">Aggregate</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <div class="navbar-nav">
                    <router-link to = "/select-combination" class="nav-item nav-link">My Grades</router-link>
                    <router-link to = "/universities" class="nav-item nav-link">Explore Universities</router-link>
                    <a href = "#" class="nav-item nav-link">Scholarships</a>
                    <a href = "#" class="nav-item nav-link">My Account</a>
                </div>
            </div>
        </nav>
   </div>
</template>

<script>

export default {
    name : "navbar"
}

</script>
