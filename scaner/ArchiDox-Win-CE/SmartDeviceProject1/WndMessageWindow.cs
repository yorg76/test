using System;
using System.Linq;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Resources;
using System.Net;
using System.IO;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using System.Collections.Specialized;
using Microsoft.WindowsCE.Forms;
using Datalogic.API;
using System.Text.RegularExpressions;

namespace ArchiDox
{
    public class SearchWndMessageWindow : MessageWindow
    {
        // Reference to the window we will subclass.
        private SearchForm dlgParent;

        public SearchWndMessageWindow(SearchForm frm)
        {
            this.dlgParent = frm;
        }

        /// <summary>
        /// This overrides WndProc (the window's message pump). From
        /// here we can see what messages are being sent. In our case
        /// all we care about is WM_SCANNED and WM_TIMEOUT.
        /// </summary>
        /// <param name="msg">The Windows Message to process.</param>
        protected override void WndProc(ref Message msg)
        {

            switch (msg.Msg)
            {
                case Constants.WM_SCANNED:
                    // The Request ID is stored in the LPARAM parameter
                    // of the message.
                    Console.Error.WriteLine("WM_SCANNED");
                    dlgParent.SetDcdText(msg.LParam.ToInt32());
                    break;
                case Constants.WM_TIMEOUT:
                    Console.Error.WriteLine("WM_TIMEOUT");
                    Console.Error.WriteLine("Timed out before string read!");
                    Console.Error.Flush();

                    break;

                case Constants.WM_STARTSCAN:
                    Console.Error.WriteLine("WM_START_SCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_STOPSCAN:
                    Console.Error.WriteLine("WM_STOP_SCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_PRESSSCAN:
                    Console.Error.WriteLine("WM_PRESSSCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_RELEASESCAN:
                    Console.Error.WriteLine("WM_RELEASESCAN");
                    Console.Error.Flush();
                    break;
            }

            base.WndProc(ref msg);
        }
    }

    public class ReceptionWndMessageWindow : MessageWindow
    {
        // Reference to the window we will subclass.
        private ReceptionForm dlgParent;

        public ReceptionWndMessageWindow(ReceptionForm frm)
        {
            this.dlgParent = frm;
        }

        /// <summary>
        /// This overrides WndProc (the window's message pump). From
        /// here we can see what messages are being sent. In our case
        /// all we care about is WM_SCANNED and WM_TIMEOUT.
        /// </summary>
        /// <param name="msg">The Windows Message to process.</param>
        protected override void WndProc(ref Message msg)
        {

            switch (msg.Msg)
            {
                case Constants.WM_SCANNED:
                    // The Request ID is stored in the LPARAM parameter
                    // of the message.
                    Console.Error.WriteLine("WM_SCANNED");
                    dlgParent.SetDcdText(msg.LParam.ToInt32());
                    break;
                case Constants.WM_TIMEOUT:
                    Console.Error.WriteLine("WM_TIMEOUT");
                    Console.Error.WriteLine("Timed out before string read!");
                    Console.Error.Flush();

                    break;

                case Constants.WM_STARTSCAN:
                    Console.Error.WriteLine("WM_START_SCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_STOPSCAN:
                    Console.Error.WriteLine("WM_STOP_SCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_PRESSSCAN:
                    Console.Error.WriteLine("WM_PRESSSCAN");
                    Console.Error.Flush();

                    break;

                case Constants.WM_RELEASESCAN:
                    Console.Error.WriteLine("WM_RELEASESCAN");
                    Console.Error.Flush();
                    break;
            }

            base.WndProc(ref msg);
        }
    }
}
