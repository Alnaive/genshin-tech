<template>
    <footer class="footer ">
  <div>
    <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg>
    <p>Genshin-Tech.com<br> This site is fan made.
    All game content and assets are trademarks and copyrights of <a href="https://genshin.hoyoverse.com/en/home" target="_BLANK">HoYoverse</a>.</p>
  </div> 
  <div>
    <span class="footer-title">Social</span> 
    <div class="grid grid-flow-col gap-4">
      <a href="https://www.youtube.com/channel/UCncHcQhLeLOqW136UUpAxaA" target="_BLANK"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
      <a href="https://www.facebook.com/GQuasar/" target="_BLANK"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
      <a href="https://discord.gg/shNzvdfSDC" target="_BLANK">
        <img src="https://cdn.discordapp.com/attachments/873515567930290237/954973369487458364/unknown.png" alt="" width="24px" height="24px">
      </a>
    </div>
  </div>
  <div>
    <span class="footer-title">Legal</span> 
    <label for="myTerms" class="link link-hover">Terms of use</label>
    <label for="myPripacy" class="link link-hover">Privacy policy</label>
    <label for="donate" class="link link-hover">Donate</label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="myTerms" class="modal-toggle">
    <label for="myTerms" class="modal cursor-pointer">
      <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Information Usage</h3>
        <p class="py-4"><li> We or i may use the information for statistical, marketing and advertisement purposes. </li>
					<li> We or i may use the information to enhance the performance of the website by following webpage trends, and other statistical manners. </li>
          <li>IP addresses and any information collected are not linked to any information that can be personally identified.</li>
        </p>
      </label>
    </label>
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="myPripacy" class="modal-toggle">
    <label for="myPripacy" class="modal cursor-pointer">
      <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Information Collection</h3>
        <p class="py-4">We may collect, record and store information each time you visit the website and input from Build form and Like such as :
						<li>Your Country by IP Address</li>
						<li>Local Storage for Genshin DB API</li>
        </p><br>
            <p>By using this app, you adhere to these policies and agree to its terms. You may contact us for any comments or questions about our privacy policy. We or I may update the privacy policy at any time.</p>
      </label>
    </label>
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="donate" class="modal-toggle">
    <label for="donate" class="modal cursor-pointer">
      <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Donate me :)</h3>
        <p><a href="https://ko-fi.com/astolo" target="_Blank" style="color:white;">Ko-fi</a> | <a href="https://trakteer.id/astolo" target="_Blank" style="color:white;">Trakteer</a></p>
      </label>
    </label>
  </div>
  <div><!-- The button to open modal -->
      <span class="footer-title"><label for="my-modal-4" class="btn modal-button bg-transparent">Credits</label> </span>

      <!-- Put this part before </body> tag -->
      <input type="checkbox" id="my-modal-4" class="modal-toggle" />
      <label for="my-modal-4" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Credits</h3>
          <p class="py-4">
            This Application Made With Laravel,Vue Js, Tailwind & daisyUI.
          </p>
          <p><a href="https://github.com/theBowja/genshin-db" target="_BLANK">Genshin DB for the data</a></p>
        </label>
      </label></div>
</footer>
</template>

<script>
import { HeartIcon } from '@heroicons/vue/solid'
export default {
    components: {
        HeartIcon,
    },
}
</script>

<style></style>
