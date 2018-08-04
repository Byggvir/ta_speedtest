# Installation errors during speedtest-cli installation

When you install speedtest-cli from github you may get some errors.

Please review *all* messages from the installation report. 

In case you mist the last *all* means *all* and not only the last one.

## Missing setup tools

Error message from `sudo python setup.py` 

```
Traceback (most recent call last):
File "setup.py", line 22, in <module>
    from setuptools import setup
ImportError: No module named setuptools
```

Solution: Install python-setuptools and python3-setuptools.

## Missing file speedtest.py

Error message from *sudo python speedtest-cli/setup.py* after cloning the repository:

```
file speedtest.py (for module speedtest) not found
file speedtest.py (for module speedtest) not found
warning: install_lib: 'build/lib.linux-armv7l-2.7' does not exist -- no Python modules to install
```

Solution: Change to directory speedtest-cli and run *sudo python setup.py install*.
