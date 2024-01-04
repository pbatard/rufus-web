core.img was created from:
  https://ftp.gnu.org/gnu/grub/grub-2.12.tar.xz
on a Debian 12.4 x64 system, with gawk installed, and with grub-core/extra_deps.lst added from the GRUB git
repo (since, despite taking YEARS to release, GRUB still manages to produce BROKEN releases, per
https://lists.gnu.org/archive/html/grub-devel/2023-12/msg00054.html) using the commands:
  ./autogen.sh
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk part_msdos fat ntfs exfat -o core.img
