core.img was created from:
    https://ftp.gnu.org/gnu/grub/grub-2.04.tar.xz
  with the following 3 extra patches applied:
  - https://lists.gnu.org/archive/html/grub-devel/2020-07/msg00016.html
  - https://lists.gnu.org/archive/html/grub-devel/2020-07/msg00017.html
  - https://lists.gnu.org/archive/html/grub-devel/2021-03/msg00012.html
  on a Debian 10.x x64 system using the commands:
    ./autogen.sh
    ./configure --disable-nls --enable-boot-time
    make -j6
    cd grub-core
    ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub2 biosdisk part_msdos fat ntfs exfat -o core.img
