php artisan make:livewire Auth/Login
php artisan make:livewire Auth/Logout
php artisan make:livewire Auth/Register
php artisan make:livewire Auth/ConfirmPassword
php artisan make:livewire Auth/TwoFactorChallenge
php artisan make:livewire Auth/ResetPassword
php artisan make:livewire Auth/ForgotPassword
php artisan make:livewire Auth/VerifyEmail

php artisan make:livewire Profile/Show
php artisan make:livewire Profile/TwoFactorPage

php artisan make:middleware EnsureTwoFactorIsEnabled
php artisan make:middleware ThrottleLoginAttempts

 php artisan make:middleware SecurityHeaders


php artisan make:livewire System/Geral/Church/Only/OnlyChurches
php artisan make:livewire System/Geral/Church/Only/BibleReading
php artisan make:livewire System/Geral/Church/Only/ChuchGoodPractices
php artisan make:livewire System/Geral/Church/Only/ChurchPastoral
php artisan make:livewire System/Geral/Church/Members/Members
php artisan make:livewire System/Geral/Church/Ministries/Ministries
php artisan make:livewire System/Geral/Church/Events/Events
php artisan make:livewire System/Geral/Church/Events/Schedules
php artisan make:livewire System/Geral/Church/Events/Scale
php artisan make:livewire System/Geral/Church/Events/StandardCult
php artisan make:livewire System/Geral/Church/Members/TalentMap
php artisan make:livewire System/Geral/Church/Events/Calendar
php artisan make:livewire System/Geral/Church/Courses/Courses
php artisan make:livewire System/Geral/Church/Courses/CourseRegistered
php artisan make:livewire System/Geral/Church/Courses/ProgressReport
php artisan make:livewire System/Geral/Church/Fincance/FinancialMoviment
php artisan make:livewire System/Geral/Church/Fincance/FinancialReport
php artisan make:livewire System/Geral/Church/Fincance/OnlineDonations
php artisan make:livewire System/Geral/Church/Members/Volunteers
php artisan make:livewire System/Geral/Church/Settings/Resources
php artisan make:livewire System/Geral/Church/Only/PastoralCare
php artisan make:livewire System/Geral/Church/Marketplace/Products
php artisan make:livewire System/Geral/Church/Marketplace/Orders
php artisan make:livewire System/Geral/Church/Marketplace/Payments





# Definição de pacotes e permissões
php artisan make:livewire Billing/Pacotes
php artisan make:livewire Billing/Modulos
php artisan make:livewire Billing/PermissoesPacote

# Gestão de assinaturas (lado admin)
php artisan make:livewire Billing/Assinaturas/Atual
php artisan make:livewire Billing/Assinaturas/Historico
php artisan make:livewire Billing/Assinaturas/Pagamentos
php artisan make:livewire Billing/Assinaturas/Faturas
php artisan make:livewire Billing/Assinaturas/Notificacoes
php artisan make:livewire Billing/Assinaturas/Upgrades
