@extends('templates.default')
@section('content')
@if(Auth::user()->photographer)
@if(Auth::user()->photographer->status === 1)
<div class="max-w-3xl mx-auto px-4 py-10">
	<div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
		<div>
			<svg class="mb-4 h-20 w-20 text-yellow-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  
									<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
							  </svg>

			<h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Заявка отправленна</h2>

			<div class="text-gray-600 text-center mb-8">
				Спасибо. Мы рассмотрим вашу заявку на фотографа. Результаты заявки будут отправлены вам на E-mail. 
			</div>
<a href="/">
			<button			
				class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
			>На главную</button></a>
		</div>
	</div>
</div>
@endif
@if(Auth::user()->photographer->status === 2)
<div class="max-w-3xl mx-auto px-4 py-10">
	<div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
		<div>
			<svg class="mb-4 h-20 w-20 text-green-500  mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

			<h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Ваша заявка одобрена</h2>

			<div class="text-gray-600 text-center mb-8">
				Поздравляем, ваша заявка одобренна. Теперь вы можете просмотривать задания и откликаться на них.
			</div>
<a href="/">
			<button			
				class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
			>На главную</button></a>
		</div>
	</div>
</div>@endif
@if(Auth::user()->photographer->status === 3)
<div class="max-w-3xl mx-auto px-4 py-10">
	<div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
		<div>
			<svg class="mb-4 h-20 w-20 text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  
			
					<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
			
			  </svg>

			<h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Заявка не одобрена</h2>

			<div class="text-gray-600 text-center mb-8">
				Извините, ваша заявка была не одобрена. Подробности отправлены на E-mail. Следуйте рекомендациям, что успешной повтороной заявки.
			</div>
<a href="/">
			<button			
				class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
			>На главную</button></a>
		</div>
	</div>
</div>@endif

@endif
@if(empty(Auth::user()->photographer))
<!-- This is an example component -->
<div class="h-screen ">
 

	<style>
		[x-cloak] {
			display: none;
		}

		[type="checkbox"] {
			box-sizing: border-box;
			padding: 0;
		}

		.form-checkbox,
		.form-radio {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			-webkit-print-color-adjust: exact;
			color-adjust: exact;
			display: inline-block;
			vertical-align: middle;
			background-origin: border-box;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			flex-shrink: 0;
			color: currentColor;
			background-color: #fff;
			border-color: #e2e8f0;
			border-width: 1px;
			height: 1.4em;
			width: 1.4em;
		}

		.form-checkbox {
			border-radius: 0.25rem;
		}

		.form-radio {
			border-radius: 50%;
		}

		.form-checkbox:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}
		
		.form-radio:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}
	</style>
	
	<div x-data="app()" x-cloak>
		<div class="max-w-3xl  mx-auto px-4 py-10">

			

			<div x-show.transition="step != 'complete'">	
				<!-- Top Navigation -->
				<div class="border-b-2 py-4">
					<div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Шаг: ${step} из 2`"></div>
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-gray-700 leading-tight">Специализация</div>
							</div>
							
							<div x-show="step === 2">
								<div class="text-lg font-bold text-gray-700 leading-tight">Личные данные</div>
							</div>
							
						</div>

						<div class="flex items-center md:w-64">
							<div class="w-full bg-white rounded-full mr-2">
								<div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 2 * 100) +'%'"></div>
							</div>
							<div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 2 * 100) +'%'"></div>
						</div>
					</div>
				</div>
				<!-- /Top Navigation -->
				<form class="form-horizontal" id="form1" method="POST" action="{{ route('postform') }}">
					{{ csrf_field() }}
				<!-- Step Content -->
				<div class="py-10">	
					<div x-show.transition.in="step === 1">

                       
						<div class="mb-5">
							<label for="spec" class="font-medium mb-1 text-gray-700 block">Основная специальность*</label>
							<input id="spec" name="spec" type="text"
								class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
								placeholder="Свадебный фотограф" required>
						</div>

                        <label for="firstname" class="font-medium mb-1 text-gray-700 block">Выберите категории, в которых вы проводите фотосъемки</label>
                        <div class="mb-5 grid sm:grid-cols-3 gap-2 place-items-stretch">
                        
                        @foreach ($categories as $category)
                        
                        <label class="items-center">
                            <div class="border rounded-md bg-white m-1 p-3">                    
                            <input type="checkbox" name="category[]" value="{{$category->title}}" class="form-checkbox h-5 w-5 text-indigo-600">
                            <span class="ml-2 text-gray-700">{{ $category->title }}</span>       
                            </div>                     
                        </label>
                        @endforeach
                        </div>

						<div class="mb-5">
							<label for="experience" class="font-medium mb-1 text-gray-700 block">Год начала деятельности*</label>
							<input type="number" id="experience" name="experience" 
								class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
								placeholder="2013" required>
						</div>

                        <div class="mb-5">
							<label for="price" class="font-medium mb-1 text-gray-700 block">Стоимость съёмки в час</label>
							<input type="number" id="price" name="price" 
								class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
								placeholder="1000 ₽">
						</div>
						

                        <div class="mb-1 ">
                            <label for="about" class="font-medium mb-1 text-gray-700 block">Дополнительная информация о своей деятельности*</label>
                          
                            <textarea name="about" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50" id="description" rows="5"  value="{{ old('description') }}"
                                placeholder="Оброзование, сертификаты, курсы, награды..." required></textarea>
                        </div>
					
						<div class="mb-5">
							<label for="portfolio" class="font-medium mb-1 text-gray-700 block">Ваше портфолио*</label>
							<input type="text" id="portfolio" name="portfolio" 
								class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
								placeholder="Введите ссылку на ваше портфолио" required>
						</div>
					</div>
					<div x-show.transition.in="step === 2">

						<div id="app" class="mb-5">
							<div class="mb-5">
								<span class="text-xl font-medium text-gray-700">Контакты и профили в социальных сетях </span></div>
							<div class="mb-5">
								<label for="phone" class="font-medium mb-1 text-gray-700 block">Номер телефона*</label>
								<input id="phone" name="phone" v-mask="'+# ###-###-##-##'"
									class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
									placeholder="+7 978-111-11-11" required value="{{old('phone', Auth::user()->phone ?? '') }}" >                
							</div>
							
							<div class="mb-5">
								<label for="gender" class="font-bold mb-1 text-gray-700 block">Пол</label>
								
								<div class="flex">
									<label
										class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
										<div class="text-teal-600 mr-3">
											<input type="radio" x-model="gender" value="Male" class="form-radio focus:outline-none focus:shadow-outline"  />
										</div>
										<div class="select-none text-gray-700">Мужской</div>
									</label>
	
									<label
										class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
										<div class="text-teal-600 mr-3">
											<input type="radio" x-model="gender" value="Female" class="form-radio focus:outline-none focus:shadow-outline"/>
										</div>
										<div class="select-none text-gray-700">Женский</div>
									</label>
								</div>
							</div>
					
							<div class="mb-5">
								<label for="vk" class="font-medium mb-1 text-gray-700 block">Вконтакте</label>
								<input type="text" id="vk" name="vk"
									class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
									placeholder="@login"  >
							</div>
							<div class="mb-5">
								<label for="inst" class="font-medium mb-1 text-gray-700 block">Instagram</label>
								<input type="text" id="inst" name="inst"
									class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
									placeholder="@login"  >
							</div>
							<div class="mb-5">
								<label for="fb" class="font-medium mb-1 text-gray-700 block">Facebook</label>
								<input type="text" id="fb" name="fb"
									class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
									placeholder="@login"  >
							</div>

					
							</div>

							

					</div>
					
				</div>
			</form>
				<!-- / Step Content -->
			</div>
		</div>

		<!-- Bottom Navigation -->	
		<div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
			<div class="max-w-3xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="w-1/2">
						<button
							x-show="step > 1"
							@click="step--"
							class=" focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Предыдущий шаг</button>
					</div>

					<div class="w-1/2 text-right">
						<button
							x-show="step < 2"
							@click="step++"
							class=" focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
						>Следующий шаг</button>

						<button 
							@click="document.getElementById('form1').submit();"
							x-show="step === 2"
							class=" focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium" 
						>Отправить</button>
					</div>
				</div>
			</div>
		</div>
	
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	
	</div>

	<script>
		function app() {
			return {
				step: 1,			
				gender: 'Male',

				
			}
			
		}
	</script>
	@endif
@endsection
