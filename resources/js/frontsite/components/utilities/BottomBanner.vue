<template>
  <section class="bottom-banner border-0 margin-0 container-fluid py-4">
    <div class="container py-5 mt-4">
      <div class="row align-items-center">
        <div
          class=" col-lg-9 text-white d-flex justify-content-lg-start justify-content-sm-center justify-content-center">
          <div class="text-lg-start text-center">
            <h2 class="mb-0">
              For
              <span class="font-weight-extra-bold"
                >Residential And Commercial</span
              >
              Properties
            </h2>
            <div class="d-flex justify-content-lg-start justify-content-center">
              <p class="font-weight-bold text-white mb-0 opacity-text mt-0">
                Our Staff is trained to find any location you need!
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 mt-5 mt-lg-0">
          <div class="banner-button">
            <router-link
             :to="getRoutePath('/contactus')"
              class=" btn btn-primary test-fancy border-0 btn-block font-weight-bold py-4 anchor-button d-flex justify-content-center">
              <div>CONTACT US</div>
              <div class="px-2">
                <i style="font-size: 16px" class="fal fa-long-arrow-right"></i>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import {computed} from "vue";
import store from "../../store";
export default {
  name: "BottomBanner",
    setup(){
        const profile = computed(() => {
            return store.getters.getProfile ? store.getters.getProfile : null;
        });

        function getRoutePath(path = ''){
            return  store.getters.getCurrentAgencySlug ? {path:'/'+store.getters.getCurrentAgencySlug+path}
                : (props.isAuthenticated) ?  {path:'/'+profile.agencies[0].slug+path}
                    : {path:'/'+store.getters.getDefaultAgencySlug+path}
        }
      return{
          getRoutePath
      }
    }

};
</script>

<style scoped>
</style>
