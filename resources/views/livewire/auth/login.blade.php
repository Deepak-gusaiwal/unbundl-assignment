<div class="p-2">
    <form wire:submit="login" class="max-w-[400px] mx-auto md:my-4 my-2 p-4 bg-gray-50 rounded-md shadow-md">
        <h2 class="text-center capitalize md:text-4xl text-xl text-primary-500 font-bold mb-4">Welcome Back</h2>
        <x-form.input inputBoxStyle="mb-2" name="emailOrName" label="Email Or Name" id="emailOrName" />
        <x-form.input inputBoxStyle="mb-2" name="password" label="Passowrd" id="password" type="password" />
        <x-form.button type="submit" class="mx-auto">Login <i class=" ri-login-circle-fill"></i> <x-helper.loading
                target="login" /></x-form.button>
    </form>
</div>