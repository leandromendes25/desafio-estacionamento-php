<?php

use Leandro\Estacionamento\Controller\{Home,
    FormularioLogin,
    FormularioCadastro,
    ListarOpcoes,
    Logout,
    RealizeLogin,
    PersistenceUser};

return [
    '' => Home::class,
    '/' => Home::class,
    '/login' => FormularioLogin::class,
    '/cadastrar' => FormularioCadastro::class,
    '/realizaLogin' => RealizeLogin::class,
    '/logout' => Logout::class,
    '/register'=> PersistenceUser::class,
    '/listarOpcoes' => ListarOpcoes::class,
];