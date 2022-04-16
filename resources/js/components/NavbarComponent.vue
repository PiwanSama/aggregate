<template>
   <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
            <router-link to = "/" class="navbar-brand">Aggregate</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <div class="navbar-nav">
                    <router-link to = "/universities" class="nav-item nav-link">Local Universities</router-link>
                    <router-link to = "/subjects" class="nav-item nav-link">A Level Subjects</router-link>
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
