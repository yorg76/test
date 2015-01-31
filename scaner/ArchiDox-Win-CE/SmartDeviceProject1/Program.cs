using System;
using System.Linq;
using System.Collections.Generic;
using System.Windows.Forms;
using System.IO;

namespace ArchiDox
{
    internal sealed class Constants
    {
        public const int WM_APP = 0x8000;
        public const int WM_SCANNED = WM_APP + 1;
        public const int WM_TIMEOUT = WM_APP + 2;

        // Added WM_USER constants.
        public const int WM_STARTSCAN = WM_APP + 3;
        public const int WM_STOPSCAN = WM_APP + 4;
        public const int WM_PRESSSCAN = WM_APP + 5;
        public const int WM_RELEASESCAN = WM_APP + 6;
    }

    static class Program
    {

        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [MTAThread]
        static void Main()
        {

             Application.Run(new LoginForm());
             Console.Error.Close();
        }
    }
}