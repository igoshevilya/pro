@extends('templates.default')
@section('content')

<div class="bg-white">
<div class="bg-cream">
  <div class="max-w-screen-xl px-8 mx-auto flex flex-col lg:flex-row items-start">
    <!--Left Col-->
    <div class="flex flex-col w-full lg:w-6/12 justify-center lg:pt-24 items-start text-center lg:text-left mb-5 md:mb-0">
      <h1  class="my-4 text-5xl font-bold leading-tight text-darken">
        <span class="text-indigo-500"> Найдите своего</span> фотографа
      </h1>
      <p  class="leading-normal text-2xl mb-8">Поможем найти надежного и проверенного фотографа для любых задач</p>
      <div  class="w-full md:flex items-center justify-center lg:justify-start md:space-x-5">
     
        @guest
        <a href="{{route('order.create')}}">
          <button class="lg:mx-0 bg-indigo-500 text-white text-xl font-bold rounded-full py-4 px-9 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
            Создать заказ
          </button>
          </a>
         
        @endauth
        @role('user')
        <a href="{{route('order.create')}}">
          <button class="lg:mx-0 bg-indigo-500 text-white text-xl font-bold rounded-full py-4 px-9 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
            Создать заказ
          </button>
          </a><div>
          <a class="" href="{{route('catalog')}}">
            <span class="cursor-pointer text-xl font-bold hover:scale-110 text-indigo-500 hover:text-indigo-500">Найти фотографа</span>   
          </a></div>
        @endrole  

        @role('photographer')
        <a href="{{route('catalog')}}">
        <button class="lg:mx-0 bg-indigo-500 text-white text-xl font-bold rounded-full py-4 px-9 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">
          Начать поиск заказов
        </button>
        </a>
        @endrole 
      </div>
    </div>

    <div class="z-0 w-full lg:w-6/12 lg:-mt-10 relative" id="girl">
      <img  class="w-10/12 mx-auto 2xl:-mb-20" src="image/home/girl.png" />
    
      <div   class="absolute top-20 -left-6 sm:top-32 sm:left-10 md:top-40 md:left-16 lg:-left-0 lg:top-52 floating-4">
        <img class="bg-white bg-opacity-80 rounded-lg h-12 sm:h-16" src=" image/home/photographers.svg">
      </div>
  
      <div   class="absolute top-20 right-10 sm:right-24 sm:top-28 md:top-36 md:right-32 lg:top-32 lg:right-16 floating">
        <svg class="h-16 sm:h-24" viewBox="0 0 149 149" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d)"><rect x="40" y="32" width="69" height="69" rx="14" fill="#F3627C"/></g><rect x="51.35" y="44.075" width="47.3" height="44.85" rx="8" fill="white"/><path d="M74.5 54.425V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"/><path d="M65.875 58.7375L65.875 78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"/><path d="M83.125 63.9125V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round"/><defs><filter id="filter0_d" x="0" y="0" width="149" height="149" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="8"/><feGaussianBlur stdDeviation="20"/><feColorMatrix type="matrix" values="0 0 0 0 0.825 0 0 0 0 0.300438 0 0 0 0 0.396718 0 0 0 0.26 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter></defs></svg>
      </div>
  
      <div   class="absolute bottom-14 -left-4 sm:left-2 sm:bottom-20 lg:bottom-24 lg:-left-4 floating">
        <img class="bg-white bg-opacity-80 rounded-lg h-20 sm:h-28" src="image/home/ux-class.png" alt="">
      </div>
     
      <div  class="absolute bottom-20 md:bottom-48 lg:bottom-52 -right-6 lg:right-8 floating-4">
        <img class="bg-white bg-opacity-80 rounded-lg h-12 sm:h-16" src="image/home/review.svg" alt="">
      </div>
    </div>
  </div>

  <div class="relative -mt-12 lg:-mt-24"><svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero"><path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path><path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path><path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path></g><g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero"><path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path></g></g></svg></div>
</div>



<div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden">
 
  <div data-aos="flip-up" class="max-w-xl mx-auto text-center mt-24">
    <h1 class="font-bold text-darken my-3 text-3xl">Как работает <span class="text-indigo-500">севис по подбору фотографа</span></h1>
    <p class="leading-relaxed text-gray-500">Disigo - это  онлайн-сервис по поиску и подбору фотографов для разных видов съёмок</p>
  </div>

  <div class="grid md:grid-cols-3 gap-14 md:gap-5 mt-20">
    <div data-aos="fade-up" class="bg-white shadow-xl p-6 text-center rounded-xl">
      <div style="background: #5B72EE;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
        <svg class="w-8 h-8 text-white" viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z" fill="white"/>
        </svg>
      </div>
      <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken">1. Разместите заказ на съёмку</h1>
      <p class="px-4 text-gray-500">Опишите вашу съёмку. Укажите дату съёмки и бюджет</p>
    </div>
    <div data-aos="fade-up" data-aos-delay="150" class="bg-white shadow-xl p-6 text-center rounded-xl">
      <div style="background: #F48C06;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
        <svg class="w-8 h-8 text-white" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.25 19.25C11.2836 19.25 13.75 16.7836 13.75 13.75C13.75 10.7164 11.2836 8.25 8.25 8.25C5.21641 8.25 2.75 10.7164 2.75 13.75C2.75 16.7836 5.21641 19.25 8.25 19.25ZM46.75 19.25C49.7836 19.25 52.25 16.7836 52.25 13.75C52.25 10.7164 49.7836 8.25 46.75 8.25C43.7164 8.25 41.25 10.7164 41.25 13.75C41.25 16.7836 43.7164 19.25 46.75 19.25ZM49.5 22H44C42.4875 22 41.1211 22.6102 40.1242 23.5984C43.5875 25.4977 46.0453 28.9266 46.5781 33H52.25C53.7711 33 55 31.7711 55 30.25V27.5C55 24.4664 52.5336 22 49.5 22ZM27.5 22C32.8195 22 37.125 17.6945 37.125 12.375C37.125 7.05547 32.8195 2.75 27.5 2.75C22.1805 2.75 17.875 7.05547 17.875 12.375C17.875 17.6945 22.1805 22 27.5 22ZM34.1 24.75H33.3867C31.5992 25.6094 29.6141 26.125 27.5 26.125C25.3859 26.125 23.4094 25.6094 21.6133 24.75H20.9C15.4344 24.75 11 29.1844 11 34.65V37.125C11 39.4023 12.8477 41.25 15.125 41.25H39.875C42.1523 41.25 44 39.4023 44 37.125V34.65C44 29.1844 39.5656 24.75 34.1 24.75ZM14.8758 23.5984C13.8789 22.6102 12.5125 22 11 22H5.5C2.46641 22 0 24.4664 0 27.5V30.25C0 31.7711 1.22891 33 2.75 33H8.41328C8.95469 28.9266 11.4125 25.4977 14.8758 23.5984Z" fill="white"/>
        </svg>        
      </div>
      <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken">2. Получите предложения </h1>
      <p class="px-4 text-gray-500">Фотографы сами откликнутся на ваш заказ. Обсудите детали съёмки</p>
    </div>
    <div data-aos="fade-up" data-aos-delay="300" class="bg-white shadow-xl p-6 text-center rounded-xl">
      <div style="background: #29B9E7;" class="rounded-full w-16 h-16 flex items-center justify-center mx-auto shadow-lg transform -translate-y-12">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
      
        </div>
      <h1 class="font-medium text-xl mb-3 lg:px-14 text-darken lg:h-14 pt-3">3. Выберите фотографа</h1>
      <p class="px-4 text-gray-500">Выберите подходящего вам исполнителя по его портфолио, рейтингу, отзывам и цене</p>
    </div>
  </div>
	<div class="mt-28">
    <div data-aos="flip-down" class="text-center max-w-screen-md mx-auto">
      <h1 class="text-3xl font-bold mb-4">Для кого <span class="text-indigo-500">сервис Disigo</span></h1>
      <p class="text-gray-500">Disigo - это платформа, которая позволяет пользователям делать задания на фотосёмку, или искать фотографов в каталоге. Фотографы могут предлогать свои услуги и откликаться на заказы.</p>
    </div>
    <div data-aos="fade-up" class="flex flex-col md:flex-row justify-center space-y-5 md:space-y-0 md:space-x-6 lg:space-x-10 mt-7">
      <div class="relative md:w-5/12">
        <img class="rounded-2xl" src="image/home/cl.jpg" alt="">
        <div class="absolute bg-black bg-opacity-20 bottom-0 left-0 right-0 w-full h-full rounded-2xl">
          <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-white font-bold text-center text-sm lg:text-2xl mb-3">Ищите фотографа?</h1>
            <a href="{{route('order.create')}}">
            <button class="rounded-full text-white border  lg:text-md px-6 py-3 w-full font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out">Создасть заказ</button>
            </a>
          </div>
        </div>
      </div>
      <div class="relative md:w-5/12">
        <img class="rounded-2xl" src="image/home/ph.jpg" alt="">
        <div class="absolute bg-black bg-opacity-20 bottom-0 left-0 right-0 w-full h-full rounded-2xl">
          <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-white font-bold text-center text-sm lg:text-2xl mb-3">Вы фотограф?</h1>
            <a href="{{route('application.form')}}">
            <button class="rounded-full bg-indigo-500 text-white  lg:text-md px-6 py-3 w-full font-medium focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out" >Отправь заявку</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="bg-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
      <div class="flex justify-center space-x-6 md:order-2">
        <a href="https://vk.com/1goshev" class=" text-gray-400 hover:text-gray-500">
          <span class="sr-only">Vk</span>
         
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path xmlns="http://www.w3.org/2000/svg" d="M15.684 0H8.316C1.592 0 0 1.592 0 8.316v7.368C0 22.408 1.592 24 8.316 24h7.368C22.408 24 24 22.408 24 15.684V8.316C24 1.592 22.391 0 15.684 0zm3.692 17.123h-1.744c-.66 0-.864-.525-2.05-1.727-1.033-1-1.49-1.135-1.744-1.135-.356 0-.458.102-.458.593v1.575c0 .424-.135.678-1.253.678-1.846 0-3.896-1.118-5.335-3.202C4.624 10.857 4.03 8.57 4.03 8.096c0-.254.102-.491.593-.491h1.744c.44 0 .61.203.78.677.863 2.49 2.303 4.675 2.896 4.675.22 0 .322-.102.322-.66V9.721c-.068-1.186-.695-1.287-.695-1.71 0-.204.17-.407.44-.407h2.744c.373 0 .508.203.508.643v3.473c0 .372.17.508.271.508.22 0 .407-.136.813-.542 1.254-1.406 2.151-3.574 2.151-3.574.119-.254.322-.491.763-.491h1.744c.525 0 .644.27.525.643-.22 1.017-2.354 4.031-2.354 4.031-.186.305-.254.44 0 .78.186.254.796.779 1.203 1.253.745.847 1.32 1.558 1.473 2.05.17.49-.085.744-.576.744z"/>
          </svg>
      </a>
      
      <a href="https://www.instagram.com/igoshevilya/" class="ml-3 text-gray-400 hover:text-gray-500">
          <span class="sr-only">Instagram</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path xmlns="http://www.w3.org/2000/svg" d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
          </svg>
      </a>
      <a href="https://www.facebook.com/igoshot" class="ml-3 text-gray-400 hover:text-gray-500">
          <span class="sr-only">Facebook</span>
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path xmlns="http://www.w3.org/2000/svg" d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"/>
          </svg>
      </a>
      </div>
      <div class="mt-8 md:mt-0 md:order-1">
        <p class="text-center text-base text-gray-400">
          © 2021 Disigo, все права защищены.
        </p>
      </div>
    </div>
  </footer>

</div>
</div>



@endsection


 