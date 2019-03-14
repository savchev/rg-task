<?php

namespace ApplicationTest\Helper;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

trait CreateGuzzleMockTrait
{

    public function getGuzzleMock()
    {
        $mock = new MockHandler([
            new Response(200, [
                'Content-Type' => 'application/vnd.Reward Gateway Interview Exercise-v1.0+json'
            ], $this->getMockData()),
            new Response(200, [
                'Content-Type' => 'application/vnd.Reward Gateway Interview Exercise-v1.0+json'
            ]),
            new Response(),
            new Response(500, [])
        ]);
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }

    private function getMockData()
    {
        return '[{
    "uuid": "aab2bca8-fe66-3e13-89ae-548f201c87e6",
    "company": "Beatty, Witting and Toy",
    "bio": "<pre>Quis aliquid voluptas rerum quidem tempore nesciunt voluptatibus. Esse sit aut et ut est reiciendis sed. Repudiandae velit sit commodi incidunt voluptatem. Sapiente sit vel aut sint.",
    "name": "Mabel Erdman DVM",
    "title": "Production Control Manager",
    "avatar": "http:\/\/lorempixel.com\/64\/64\/people\/?75652"
  },
  {
    "uuid": "e5b01e27-34e4-36ef-bfd2-eb45c88aff20",
    "company": "Mertz, Legros and Gusikowski",
    "bio": "<p>Alias dolorum libero harum quidem sapiente vel. Impedit natus in consequuntur sed quod quam laboriosam ipsam.<\/p>",
    "name": "Laverna Wiza",
    "title": "Insurance Claims Clerk",
    "avatar": "http:\/\/httpstat.us\/503"
  },
  {
    "uuid": "5640b444-d91d-3693-88d6-ff6f7dd607d7",
    "company": "Heidenreich-Leuschke",
    "bio": "Quia illo amet ut enim veritatis minus architecto. Et est autem cupiditate. Dolor molestiae occaecati totam velit culpa et. Nihil molestias quos qui libero id.<script type=\"text\/javascript\">alert(1);<\/script>",
    "name": "Demetris Koepp",
    "title": "Dentist",
    "avatar": "http:\/\/lorempixel.com\/64\/64\/people\/?13267"
  },
  {
    "uuid": "ab9c0bb6-faac-38b9-9e7a-b9aeceafd0a5",
    "company": "Walter, O\'Reilly and Larkin",
    "bio": "<p>Facere cum esse asperiores a molestias quo veniam est. Velit accusamus nam sunt iste sunt. Est consequatur perferendis aspernatur dolor.<\/p>",
    "name": "Lora Stracke Sr.",
    "title": "Locomotive Engineer",
    "avatar": "0"
  },
  {
    "uuid": "3fad44d4-ab69-3018-a16f-71a5c2da05c9",
    "company": "Gutkowski Ltd",
    "bio": "<p>Aliquid est tenetur omnis nostrum quia est fugiat quia. Earum repellendus repellendus ut. Esse repellat amet molestiae nesciunt ad labore.<\/p>",
    "name": "Marcella Bashirian",
    "title": "Conveyor Operator",
    "avatar": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADsklEQVRYR63XdwincxwH8NeZGWXGnRWZiSJ\/kGRlJMqI0+FynSI7skpmnGzJzChd54pkZkUJ2WVE6cqR7BHK3r2v76Pnfvc83+e5zqd+f\/z6fcb795nv7xTjZXUciL2xAzbHGvgHP+ADvIln8QR+GuN6ygilzXAOZuIPPIc38CG+L\/ZrYgvshD2xHO7BVfi4FqMGYGWcj3PxMm7A4\/h9AHTsDsKZBdAcXFHAL2HaB2ATPIB1cHJJ6YhkLaYS3wFyEz7D4fh00kkXgG3wDF7HrFLfLrv0wMblh\/fwVQ\/CtTAX22NfLGjrTQLIP38JT+IE\/DXhNPqn4qxW8Kj8jWtxIX7tALIC7ir9sWs7E20Aqd2L+KSkazJ4\/N6Mkyq1+BkX4+oeEA9hbezR9EQbwKU4Bjv2pD0dnu4fIweULE7qJvhbuB2X58cGQEbtfRxSabh08nljouNeHN2jmxjzsWWy3QC4FduW1PTFuL+UZgyG17Bzj2Jips\/S5KflSzbcFyX9qVGfPFgyNAbAq9ilojgdd2BqAByJ27D+wJK5E8eNiY78kUMruquUsZ0ZAGmI9QYM4uvsslrHYLikTENNN1t1YQAkXY80XVmx2A9PjYmO\/fH0gG6mbq8A+CbNUDq3ZrM0JUhJTxwAcGxuRADkwh1cDk3NJqU6fmQGsv+zMWuSmPMDINcts5ma1CSLKCXIgarJ19gH7wzoJea8AIjB6SNKEH\/Ry1muSa7nLSMylUM3JwBeKf8+TTEkOVYLsXyP4p\/YtOvsduhfht0DIFtwg9IHQwDy+3U4o0fx+kJExvjJxV0QACEKOZXZBb+NsEwPZHK6JMusjxe09VctpZ8RAKuVVZyahAUNSS7atz1KU\/HlkAPMKH0yrTlGGZuc4d0Ky635SI1DSLtk60nG06GUmDlWL6RcDYA0V6jSEXi0Ej3MJmz3qB6d+8pRy27pk5Q8PsKiP28TktCpHJtw\/u8mrBM4cxudcLuavIvcglzPSVa1Lt7GjbgyTtoAVsTzpb4JlpHKdISCzca0EbVtq4QB311qnXMf\/48hlzCPm\/hfDEC+b1jIQuoTo1MQrrgsEpKa5ZXeCUkJKY3vRdJFy7cqr590+7IGb+JkvDO6IaN5wv0nfQ+TZOJhbPc\/gPilENHD2v+8loHmt9QsJPSCMporLWUdfix1v6i8GRbVfFLGPE43KkDSiAEVm9otSIzUPZzvmvIs68U+BkBjnO4N08knhDNNlS0ayYPko\/KwCRPKp+uFtASQfwFMNb0ytvWaBAAAAABJRU5ErkJggg=="
  }]';
    }
}
