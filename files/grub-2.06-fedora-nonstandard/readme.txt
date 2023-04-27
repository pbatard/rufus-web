Because of issue #2233, core.img was created from the GRUB gitsource obtained on 2023.04.25 from:
  https://git.savannah.gnu.org/cgit/grub.git/tree/?id=e67a551a48192a04ab705fca832d82f850162b64
with the following Fedora patch applied:
  grub_is_debug_enabled.patch
on a Debian 11.6 x64 system using the commands:
  ./autogen.sh
  # --enable-boot-time for Manjaro Linux
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub2 biosdisk fat exfat ext2 ntfs ntfscomp part_msdos -o core.img

Note that this version of GRUB is NONSTANDARD in that it uses
'/boot/grub2' prefix directory instead of '/boot/grub'.
