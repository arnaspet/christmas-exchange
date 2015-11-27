<?php
require_once __DIR__.'/../vendor/autoload.php';
use Silex\Provider\FormServiceProvider;
use Symfony\Component\Form\Form;
use \Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/Resources/views',
));
$app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
    $types[] = new \ArnasPet\ChristmasExchange\Form\ChristmasGiftReceiversType();

    return $types;
}));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig', [
        'form' => $app['form.factory']->createBuilder('christmas_gift_receivers')->getForm()->createView()
    ]);
});

$app->post('/send-emails', function (Request $request) use ($app) {
    /** @var Form $form */
    $form = $app['form.factory']->createBuilder('christmas_gift_receivers')->getForm();
    $form->handleRequest($request);

    if ($form->isValid()) {
        $randomizer = new \ArnasPet\ChristmasExchange\Service\EmailRandomizer();
        $randomizer->addRandomReceiversToSenders($form->getData()['receivers']);
    }

    return new \Symfony\Component\HttpFoundation\JsonResponse([], 200);
});

$app->run();
