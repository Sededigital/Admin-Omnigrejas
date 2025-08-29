<div>
     <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body z-3 px-md-0 px-lg-4">
                           <a href="{{ url('/login') }}" class="navbar-brand d-flex align-items-center mb-3">

                              <!--Logo start-->
                              <div class="logo-main">
                                 <div class="logo-mini">

                                        <img src="{{ asset('system/img/logo-system/icon.png') }}" alt="logo">

                                    </div>

                                  <div class="logo-mini">
                                     <img src="{{ asset('system/img/logo-system/icon.png') }}" alt="logo">
                                  </div>

                              </div>
                              <!--logo End-->

                              <h1 class="logo-title fw-bold">
                                <span class="text-primary">Omn</span><span class="text-success">Igrejas</span>
                                </h1>
                           </a>
                           <h2 class="mb-2 text-center">Entrar</h2>
                           <p class="text-center">Faça login para permanecer conectado</p>
                           @if(session()->has('login_error'))
                                <div class="alert alert-warning">
                                    {{ session('login_error') }}
                                </div>
                            @endif

                           <form wire:submit.prevent='login'>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email / telefone</label>
                                       <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model="email"  aria-describedby="email" placeholder="nome@omnigreja.com">
                                        @error('email') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Palavra-passe</label>
                                       <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" wire:model="password" aria-describedby="password" placeholder="*****">
                                        @error('password') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1" wire:model="remember">
                                       <label class="form-check-label" for="customCheck1">Lembra-se</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" wire:navigate >Esqueceu palavra-passe?</a>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                <button class="btn btn-primary bg-primary border-0 d-flex align-items-center" type="submit" wire:loading.attr="disabled">
                                    <span wire:loading wire:target="login" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Entrar
                                </button>

                              </div>
                              {{-- <p class="mt-3 text-center">
                                 Não tem uma conta? <a href="{{ url('/register') }}" class="text-underline">Clique aqui para se inscrever.</a>
                              </p> --}}
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
               <img src="{{ asset('system/img/logo-system/icon.png') }}"
                alt="logo"
                class="img-fluid opacity-75"
                width="400" height="330"
                style="max-width: 200px; max-height: 200px;" >

               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
      </div>
</div>
