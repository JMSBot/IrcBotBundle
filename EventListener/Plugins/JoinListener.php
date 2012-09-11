<?php
namespace Whisnet\IrcBotBundle\EventListener\Plugins;

use Whisnet\IrcBotBundle\EventListener\Plugins\BasePluginListener;
use Whisnet\IrcBotBundle\Event\BotCommandFoundEvent;
use Whisnet\IrcBotBundle\Annotations as ircbot;
use Whisnet\IrcBotBundle\IrcCommands\JoinCommand;

/**
 * Join to channels specified by user.
 *
 * @ircbot\CommandInfo(name="join", help="Allow bot to join to the channel/channels", arguments={"<channel>{,<channel>}"})
 *
 * @author Daniel Ancuta <whisller@gmail.com>
 */
class JoinListener extends BasePluginListener
{
    /**
     * @param BotCommandFoundEvent $event
     * @throws CommandException
     * @return boolean
     */
    public function onCommand(BotCommandFoundEvent $event)
    {
        $event->getConnection()->sendCommand(new JoinCommand($event->getArguments()));
    }
}
