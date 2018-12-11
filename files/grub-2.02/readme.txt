core.img was created from:
  http://ftp.gnu.org/gnu/grub/grub-2.02.tar.xz
on a Debian Stretch x64 system using the commands:
  ./autogen.sh
  # --enable-boot-time for Manjaro Linux
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk part_msdos fat ntfs exfat -o core.img
Note: The core.img from grub-2.02~rc1 and grub-2.02~rc2 are *binary identical* to the one from the 2.02 release.
