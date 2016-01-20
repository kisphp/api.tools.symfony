#!/usr/bin/python

__author__ = 'Marius Rizac'

class Log:
    commands = []
    debug = False

    def __init__(self, debug=False):
        """
        :param debug:
        :return:
        """
        self.debug = debug

    def add(self, text, type='success'):
        """
        :param text:
        :param type:
        :return:
        """
        if (self.debug == True):
            if (type == 'success'):
                print Colorize().success(text)
            elif (type == 'info'):
                print Colorize().info(text)
            elif (type == 'error'):
                print Colorize().error(text)

    def get(self):
        """
        :return:
        """
        return "\n".join(self.commands)

class Colorize:
    HEADER = '\033[95m'
    OKBLUE = 'Info: ' # '\033[94m'
    OKGREEN = 'Success: ' # '\033[92m'
    WARNING = '\033[93m'
    FAIL = 'Fail: ' # '\033[91m'
    ENDC = ' ' # '\033[0m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'

    def info(self, text):
        """
        :param string text:
        :return string:
        """
        return "%s%s%s" % (self.OKBLUE, text, self.ENDC)

    def success(self, text):
        """
        :param string text:
        :return string:
        """
        return "%s%s%s" % (self.OKGREEN, text, self.ENDC)

    def header(self, text):
        """
        :param string text:
        :return string:
        """
        return "%s%s%s" % (self.FAIL, text, self.ENDC)

    def error(self, text):
        """
        :param string text:
        :return string:
        """
        return "%s%s%s" % (self.FAIL, text, self.ENDC)

class Commands:
    git = '/usr/bin/git'
    php = '/usr/bin/php'

    def getCurrentTime(self):
        import datetime, pytz
        bucharest = pytz.timezone('Europe/Bucharest')
        return datetime.datetime.now(bucharest).__format__('%Y:%m:%d %H:%M')

    def getGitCommitCommands(self):
        """
        :return array:
        """
        commandSuits = [
            [self.git, 'add', '--all'],
            [self.git, 'commit', '-m', 'Backup %s' % self.getCurrentTime()],
            [self.git, 'push', 'origin', 'master'],
        ]
        return commandSuits

    def getExportDb(self, directory):
        """
        :return array:
        """
        commandSuits = [
            [self.php, '%s/app/console' % directory, 'zed:database', '--export'],
        ]
        return commandSuits

class Manager(Commands):
    sp = False
    directory = False
    git = '/usr/bin/git'
    log = False
    list = False

    def __init__(self, subprocess, directory, debug=False, list=False):
        """
        :param subprocess:
        :param directory:
        :param debug:
        :return:
        """
        self.sp = subprocess
        self.directory = directory
        self.log = Log(debug)
        self.list = list

    def _executeSuite(self, commandSuits):
        """
        :param commandSuits:
        :return:
        """
        for suite in commandSuits:
            if (self.list == True):
                print suite
            else:
                self.log.add(' '.join(suite), 'info')
                command = self.sp.Popen(suite, cwd=self.directory, stdout=None)
                command.terminate()

    def _executeWithOutput(self, commandSuits):
        """
        :param commandSuits:
        :return:
        """
        for suite in commandSuits:
            if (self.list == True):
                print ' '.join(suite)
            else:
                self.log.add(' '.join(suite), 'info')
                self.sp.call(suite, cwd=self.directory, stdout=None)

    def exportDb(self, directory):
        command = self.getExportDb(directory)
        self._executeWithOutput(command)

    def gitCommit(self):
        command = self.getGitCommitCommands()
        self._executeWithOutput(command)


class Arguments:
    position = 0
    arguments = {
        'list': False
    }
    branchSprykerPosition = None
    branchDemoshopPosition = None

    def __init__(self):
        self.parseArguments()

    def __up(self):
        self.position = self.position + 1

    def parseArguments(self):
        if len(sys.argv) == 1:
            self.arguments.update({'help': True})
            return None

        for item in sys.argv:
            if self.position == 0:
                """
                file name so skip this
                """
                self.__up()
                continue

            if (item == '-l' or item == '--list'):
                """
                show commands to run
                """
                self.arguments.update({'list': True})
                self.__up()
                continue

    def isHelp(self):
        """
        :return bool:
        """
        return self.arguments.get('help', False)

if __name__ == '__main__':
    import subprocess, sys, os

    debug = True
    arg = Arguments();

    targetDir = os.path.dirname(os.path.abspath(__file__))

    man = Manager(subprocess, directory=targetDir, debug=debug, list=arg.arguments.get('list'));
    #man.exportDb(targetDir)
    man.gitCommit()

