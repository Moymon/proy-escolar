
<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Inicio</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Auth::guest()): ?>
        <a href="<?php echo e(url('login')); ?>"></a>
        <?php else: ?>
        <div>
            <input type="text" value="<?php echo e(Auth::user()->nombre); ?>">
        </div>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => 'Notas','text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','icon' => 'fas fa-star'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?> 

    <?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => 'Cargando','text' => 'Cargando información...','icon' => 'fas fa-chart-bar','theme' => 'info','url' => '#','urlText' => 'Más..','loading' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => '424','text' => 'Vistas','icon' => 'fas fa-eye text-dark','theme' => 'teal','url' => '#','urlText' => 'Detalles...'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => 'Descargas','text' => '1205','icon' => 'fas fa-download text-white','theme' => 'purple'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086 = $component; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => '528','text' => 'Usuarios','icon' => 'fas fa-user-plus text-teal','theme' => 'primary','url' => '#','urlText' => 'Ver todos los usuarios...'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086)): ?>
<?php $component = $__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086; ?>
<?php unset($__componentOriginala47f63f833c8b0a47e1f17ee6833237811ae9086); ?>
<?php endif; ?>
    


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- jQuery -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alberto\Documents\GitHub\proy-escolar2\resources\views/dashboard.blade.php ENDPATH**/ ?>