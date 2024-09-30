// src/Controller/StockForecastController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StockForecastController extends AbstractController
{
    /**
     * @Route("/forecast", name="forecast")
     */
    public function forecast(): Response
    {
        $kernel = $this->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);

        // Execute "forecast:stock" command
        $input = new ArrayInput([
            'command' => 'forecast:stock',
            // Pass any additional arguments here if needed
        ]);
        $output = new BufferedOutput();
        $application->run($input, $output);

        // Get the output of the command
        $stockForecastOutput = $output->fetch();

        // Execute "forecast:signals" command
        $input = new ArrayInput([
            'command' => 'forecast:signals',
            // Pass any additional arguments here if needed
        ]);
        $output = new BufferedOutput();
        $application->run($input, $output);

        // Get the output of the command
        $signalsOutput = $output->fetch();

        // Render the output in a template
        return $this->render('stock_forecast/index.html.twig', [
            'stock_forecast_output' => $stockForecastOutput,
            'signals_output' => $signalsOutput,
        ]);
        
    }
}
