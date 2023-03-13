<?php namespace Application\Missions\Cli;


use Atomino\Carbon\Database\Finder\Filter;
use Atomino\Core\Cli\Attributes\Command;
use Atomino\Core\Cli\CliCommand;
use Atomino\Core\Cli\CliModule;
use Atomino\Core\Cli\Style;
//use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Output\Output;
use function Atomino\debug;

class EmailSender extends CliModule
{
    #[Command('student-reg-email', null, "Sending a registration email to registered students")]
    public function sendStudentRegistrationEmail(CliCommand $command){
        $command->define(function (Input $input, Output $output, Style $style) {


        });
    }
    #[Command('organiser-stat-email', null, "Sending a statistical email to the organisers")]
    public function sendOrganiserStatisticEmail(CliCommand $command){
        $command->define(function (Input $input, Output $output, Style $style) {


        });
    }
}
