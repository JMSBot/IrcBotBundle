<?php
namespace Whisnet\IrcBotBundle\EventListener\Plugins;

use Whisnet\IrcBotBundle\EventListener\Plugins\BasePluginListener;
use Whisnet\IrcBotBundle\Event\BotCommandFoundEvent;
use Whisnet\IrcBotBundle\Annotations as ircbot;
use Whisnet\IrcBotBundle\IrcCommands\PartCommand;

/**
 * Leave channels specified by user.
 * If no channel is specified leave from current channel.
 *
 * @ircbot\CommandInfo(name="part", help="Allow bot to leave speciefied channel/channels", arguments={"<channel>{,<channel>}"})
 *
 * @author Daniel Ancuta <whisller@gmail.com>
 */
class PartListener extends BasePluginListener
{
    /**
     * @param BotCommandFoundEvent $event
     * @throws CommandException
     * @return boolean
     */
    public function onCommand(BotCommandFoundEvent $event)
    {
        $event->getConnection()->sendCommand(new PartCommand($event->getArguments()));
    }
}